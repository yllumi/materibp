<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Materi extends CI_Controller {

	public function index()
	{
		$folders = directory_map('materi', 1);
		sort($folders);
		$index = [];
		foreach ($folders as $folder) {
			$filepath = 'materi/'.$folder.'index.json';
			if(file_exists($filepath)){
				$index[$folder] = json_decode(file_get_contents($filepath), true);
			}
		}
		$this->load->view('index', compact('index'));
	}

	public function detail($folder, $slug)
	{
		$filepath = 'materi/'.$folder.'/'.$slug.'/';
		$content = file_get_contents($filepath.'/index.txt');
		$messages = explode("\n---\n", $content);
		$title = array_shift($messages);
		
		$this->load->view('materi', compact('filepath','messages','title'));
	}

	function dd($data, $skip = false)
	{
		echo "<pre style='background:white'>";
		print_r($data);
		echo "</pre>";

		if($skip) exit();
	}

	function generateFolder()
	{
		$folders = directory_map('../materi', 1);
		sort($folders);
		$index = [];
		foreach ($folders as $folder) {
			$folderpath = '../materi/'.$folder;
			$index = json_decode(file_get_contents($folderpath.'index.json'), true);
			if($index)
				foreach ($index as $file) {
					mkdir($folderpath.$file['file'], 0777, true);
					$filepath = $folderpath.$file['file'].'/index.txt';
					file_put_contents($filepath, '');
				}
		}
	}
}
