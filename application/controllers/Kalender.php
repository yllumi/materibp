<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kalender extends CI_Controller {

	public function index($folder = '')
	{
		$index = directory_map('data-kalender/'.$folder, 1);
		sort($index);
		$this->load->view('index_kalender', compact('folder','index'));
	}

	public function detail($folder, $slug)
	{
		$filepath = 'data-kalender/'.$folder.'/'.$slug.'/';
		$content = file_get_contents($filepath.'/index.txt');
		$messages = explode("\n---\n", $content);
		$title = array_shift($messages);
		$back = site_url('kalender/index/'.$folder);
		
		$this->load->view('materi', compact('filepath','messages','title','back'));
	}

	function generateFolder()
	{
		$folders = directory_map('../data-kalender', 1);
		sort($folders);
		$index = [];
		foreach ($folders as $folder) {
			$folderpath = '../data-kalender/'.$folder;
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
