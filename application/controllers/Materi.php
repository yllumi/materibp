<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Materi extends CI_Controller {

	public function index()
	{
		$folders = directory_map('data-materi', 1);
		sort($folders);
		$index = [];
		foreach ($folders as $folder) {
			$filepath = 'data-materi/'.$folder.'index.json';
			if(file_exists($filepath)){
				$index[$folder] = json_decode(file_get_contents($filepath), true);
			}
		}
		$this->load->view('index_materi', compact('index'));
	}

	public function detail($folder, $slug)
	{
		$filepath = 'data-materi/'.$folder.'/'.$slug.'/';
		$content = file_get_contents($filepath.'/index.txt');
		$messages = explode("\n---\n", $content);
		$title = array_shift($messages);
		$back = site_url('materi');
		
		$this->load->view('materi', compact('filepath','messages','title','back'));
	}

	function generateFolder()
	{
		$folders = directory_map('../data-materi', 1);
		sort($folders);
		$index = [];
		foreach ($folders as $folder) {
			$folderpath = '../data-materi/'.$folder;
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
