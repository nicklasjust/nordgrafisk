<?php
	if(empty($_FILES))
	{
		echo json_encode(array(
			'success' 	=> false,
			'error' 	=> 'No file has been uploaded'
		));
		die;
	}

	require_once "lib/Dropbox/autoload.php";
	use \Dropbox as dbx;

	$dropboxFileChunkUploader = new DropboxFileChunkUploader();

	$dropboxFileChunkUploader->uploadFiles($_FILES);

	class DropboxFileChunkUploader
	{
		private $appInfo,
				$accessToken, 
				$dbxClient,
				$accountInfo,
				$files,
				$firstChunk,
				$endOfChunk,
				$uploadId,
				$customerId,
				$phone,
				$recoveryAttempts = 0;

		function __construct()
		{
			$this->accessToken = 'JpN9jyfsOmIAAAAAAAASMi_bfnJ9dPBbPNuhmAt2T6D9uG1nEpFMfepFtz_Ygi63';
			$this->dbxClient = new dbx\Client($this->accessToken, "NordGrafiskUpload/1.0");
		}

		public function uploadFiles($files)
		{
			$this->files = $files;

			$this->customerId 	= $_POST['customerId'];
			$this->phone 		= $_POST['phone'];
			$this->chunkOrder 	= $_POST['chunkOrder'];
			$this->offsetByte 	= intval($_POST['offsetByte']);
			$this->uploadId 	= $_POST['uploadId'];
			$this->totalChunks 	= $_POST['totalChunks'];
			$this->chunkIndex 	= $_POST['chunkIndex'];

			foreach ($this->files as $file)
			{
				$this->uploadFile($file);
			}
		}

		private function uploadFile($file)
		{
			$fileName 		= $file['name'];
			$fileType 		= $file['type'];
			$fileTmpName 	= $file['tmp_name'];
			$fileError 		= $file['error'];
			$fileSize 		= $file['size'];

			$fileTypeParts 	= explode('/', $fileType);
			$fileExtention 	= $fileTypeParts[1];

			$f 				= fopen($fileTmpName, "rb");
			$stringContent 	= stream_get_contents($f);

			$result 	= null;
			$where 		= null;
			$success 	= true;

			if($this->chunkIndex == 0) //If the chunk is the first, start DB chunk upload
			{
				$this->uploadId = $this->dbxClient->chunkedUploadStart($stringContent);

				$where = '1';

				$result = 'first chunk';

				if($this->chunkIndex+1 == $this->totalChunks) //If the chunk is also the last, finish DB chunk upload
				{
					$result = $this->dbxClient->chunkedUploadFinish( $this->uploadId, "/".$this->customerId."/tlf.: ".$this->phone." - ".$fileName, dbx\WriteMode::add());
					$where = '2';
				}
			}
			else if($this->chunkIndex+1 == $this->totalChunks) //If the chunk is the last, finish DB chunk upload
			{
				$result = $this->dbxClient->chunkedUploadContinue( $this->uploadId, $this->offsetByte , $stringContent);
				$result = $this->dbxClient->chunkedUploadFinish( $this->uploadId, "/".$this->customerId."/tlf.: ".$this->phone." - ".$fileName, dbx\WriteMode::add());
				$where = '3';
			}
			else // If the chunk is niether the first or last, continue upload
			{
				$result = $this->dbxClient->chunkedUploadContinue( $this->uploadId, $this->offsetByte , $stringContent);
				$where = '4';
				if(is_int($result))
				{
					if($this->recoveryAttempts < 2)
					{
						sleep(0.5);
						$this->recoveryAttempts++;
						$this->uploadFile($file);
						exit;
					}
					else
					{
						$success = false;
					}
				}
			}

			fclose($f);

			echo json_encode(array(
				'success' 		=> $success,
				'where' 		=> $where,
				'result' 		=> $result,
				'uploadId' 		=> $this->uploadId,
				'chunkIndex'	=> $this->chunkIndex,
				'recovery' 		=> $this->recoveryAttempts
			));	
		}
	}	
?>