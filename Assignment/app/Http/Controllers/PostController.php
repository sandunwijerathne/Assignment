<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Postmeta;
use App\Models\Termrelation;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View as View;
use PhpParser\Node\Stmt\TryCatch;

class PostController extends Controller
{

	public function index()
	{

		if (Session::has('user_id')) {
			$categories  = $this->getCategories();
			return view('book', compact(['categories']));
		} else {
			return redirect('/');
		}
	}

	public function createpost(Request $request)
	{

		$post_title = $request->input('post_title');
		$post_image = $request->file('post_image');
		$post_content = $request->input('post_content');
		$post_author = $request->input('post_author');
		$post_publisher = $request->input('post_publisher');
		$post_publish_year = $request->input('post_year_of_publication');
		$post_category = $request->input('post_categories');

		$Filename = $this->uploadpostImage($request, "post_image", "../../swivel/wp-content/uploads/2023/03");

		try {
			$postid = Post::firstOrCreate([
				'post_author'  => '1',
				'post_date'  => '2023-03-27 15:37:03',
				'post_date_gmt'  => '2023-03-27 15:37:03',
				'post_content'  => $post_content,
				'post_title'  => $post_title,
				'post_excerpt'  => $post_content,
				'post_status'  => 'publish',
				'comment_status' => 'closed',
				'ping_status' => 'closed',
				'post_password' => '',
				'post_name' => $post_title,
				'to_ping' => '',
				'pinged' => '',
				'post_modified' => '2023-03-27 15:37:03',
				'post_modified_gmt' => '2023-03-27 15:37:03',
				'post_content_filtered' => '',
				'post_parent' => '0',
				'guid' => '',
				'menu_order' => 0,
				'post_type' => 'book',
				'post_mime_type' => '',
				'comment_count' => '0'
			])->ID;

			$postidtwo = Post::firstOrCreate([
				'post_author'  => '1',
				'post_date'  => '2023-03-27 15:37:03',
				'post_date_gmt'  => '2023-03-27 15:37:03',
				'post_content'  => $post_content,
				'post_title'  => $post_title,
				'post_excerpt'  => $post_content,
				'post_status'  => 'inherit',
				'comment_status' => 'open',
				'ping_status' => 'closed',
				'post_password' => '',
				'post_name' => $post_title,
				'to_ping' => '',
				'pinged' => '',
				'post_modified' => '2023-03-27 15:37:03',
				'post_modified_gmt' => '2023-03-27 15:37:03',
				'post_content_filtered' => '',
				'post_parent' => $postid,
				'guid' => 'http://localhost/swivel/wp-content/uploads/2023/03/' . $Filename,
				'menu_order' => 0,
				'post_type' => 'attachment',
				'post_mime_type' => 'image/jpeg',
				'comment_count' => '0'
			])->ID;

			$Postmeta = new Postmeta();


			// echo "id" . $postid + 1;

			$postmetadata = [
				['post_id' => $postid, 'meta_key' => '_edit_last', 'meta_value' => '1'],
				['post_id' => $postid, 'meta_key' => '_edit_lock', 'meta_value' => ''],
				['post_id' => $postid, 'meta_key' => '_thumbnail_id', 'meta_value' => $postidtwo],
				['post_id' => $postid, 'meta_key' => 'author', 'meta_value' => $post_author],
				['post_id' => $postid, 'meta_key' => 'publisher', 'meta_value' => $post_publisher],
				['post_id' => $postid, 'meta_key' => 'year_of_publication', 'meta_value' => $post_publish_year],
			];
			$Postmeta::insert($postmetadata);

			$postmetafile = [
				['post_id' => $postidtwo, 'meta_key' => '_wp_attached_file', 'meta_value' => '2023/03/' . $Filename],
				['post_id' => $postidtwo, 'meta_key' => '_wp_attachment_metadata', 'meta_value' => 'a:6:{s:5:"width";i:240;s:6:"height";i:320;s:4:"file";s:22:"' . $Filename . '";s:8:"filesize";i:73388;s:5:"sizes";a:0:{}s:10:"image_meta";a:12:{s:8:"aperture";s:1:"0";s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";s:1:"0";s:9:"copyright";s:0:"";s:12:"focal_length";s:1:"0";s:3:"iso";s:1:"0";s:13:"shutter_speed";s:1:"0";s:5:"title";s:0:"";s:11:"orientation";s:1:"1";s:8:"keywords";a:0:{}}}']

			];
			$Postmeta::insert($postmetafile);

			Termrelation::insert([
				'object_id'  => $postid,
				'term_taxonomy_id'  => $post_category,
				'term_order' => '0'
			]);
			return redirect()->back();
		} catch (Exception $e) {
			echo $e;
		}
	}
	public function delete($id)
	{
		$deletedpost = Post::find($id);
		$deletedpost->delete();
		return redirect()->back();
	}
	public function updateview($id)
	{
		$getpost = Post::where('ID', '=', $id)->get();
		$getpostauthor = Postmeta::where('post_id', '=', $id)->where('meta_key', '=', 'author')->get();
		$getpostpublisher = Postmeta::where('post_id', '=', $id)->where('meta_key', '=', 'publisher')->get();
		$getpostyear = Postmeta::where('post_id', '=', $id)->where('meta_key', '=', 'year_of_publication')->get();
		$getcatgory = Termrelation::where('object_id', "=", $id)->get();
		$categories  = $this->getCategories();
		return view('bookupdate', compact(['getpost', 'categories', 'getpostauthor', 'getpostpublisher', 'getpostyear', 'getcatgory']));
	}

	public function updatpost(Request $request)
	{
		$post_title = $request->input('post_title');
		$post_image = $request->file('post_image');
		$post_content = $request->input('post_content');
		$post_author = $request->input('post_author');
		$post_publisher = $request->input('post_publisher');
		$post_publish_year = $request->input('post_year_of_publication');
		$post_category = $request->input('post_categories');
		$Filename = $this->uploadpostImage($request, "post_image", "../../swivel/wp-content/uploads/2023/03");

		$post = Post::find($request->input('post_id'));
		$post->post_title = $post_title;
		$post->post_content = $post_content;
		$post->post_title = $post_title;
		$post->post_excerpt = $post_content;
		$post->post_name = $post_title;
		$post->save();

		$posttwo = Post::find($request->input('post_id') + 1);
		$posttwo->post_title = $post_title;
		$posttwo->post_content = $post_content;
		$posttwo->post_title = $post_title;
		$posttwo->post_excerpt = $post_content;
		$posttwo->post_name = $post_title;
		$posttwo->post_parent = $request->input('post_id');
		$posttwo->guid = 'http://localhost/swivel/wp-content/uploads/2023/03/' . $Filename;
		$posttwo->save();

		$postimage = Postmeta::where('post_id', '=', $request->input('post_id')+1)->where('meta_key', '=', '_wp_attached_file')->update(["meta_value" =>'2023/03/' . $Filename]);

		$postauthor = Postmeta::where('post_id', '=', $request->input('post_id'))->where('meta_key', '=', 'author')->update(["meta_value" => $post_author]);

		$postpublisher = Postmeta::where('post_id', '=', $request->input('post_id'))->where('meta_key', '=', 'publisher')->update(["meta_value" => $post_publisher]);

		$postpublishyear = Postmeta::where('post_id', '=', $request->input('post_id'))->where('meta_key', '=', 'year_of_publication')->update(["meta_value" => $post_publish_year]);

		$cateid = Termrelation::where('object_id', '=', $request->input('post_id'))->update(["term_taxonomy_id" => $post_category]);


		return redirect('/home');
	}
}
