<?php

namespace App\Http\Controllers\Web;

use App\Models\Ad;
use App\Models\Ad2;
use App\Models\Ad3;
use App\Models\Subject;
use App\Models\Category;
use App\Models\SubCategory;
use Mockery\Matcher\Subset;
use Illuminate\Http\Request;
use App\Models\CategoryTotal;
use App\Models\GeneralSetting;
use App\Http\Controllers\Controller;
use App\Models\BookDrive;
use App\Models\BookDriveFile;
use App\Models\Drive;
use App\Models\DriveFile;
use App\Models\Exam;
use App\Models\ExamAnser;

class HomeController extends Controller
{
    //
    public function eduPlatform()
    {
        $generalSetting = GeneralSetting::first();
        $subCategories = SubCategory::get();
        $categories = Category::paginate(12);
        $categoriesAll = Category::get();
        $ads = Ad::first();
        $ad2s = Ad2::first();
        $ad3s = Ad3::first();
        $drives = Drive::get();
        $categoryFirst = Category::first();
        $subjects = Subject::take(10)->get();
        return view('web.pages.eduPlatform', compact('subjects', 'drives', 'categories', 'ad2s', 'ad3s', 'categoryFirst', 'ads', 'generalSetting', 'subCategories', 'categoriesAll'));
    }

    public function subjects($id)
    {
        $generalSetting = GeneralSetting::first();
        $subjects = Subject::get();
        $categories = Category::get();
        $ads = Ad::first();
        $ad2s = Ad2::first();
        $ad3s = Ad3::first();
        $drives = Drive::get();
        $category = Category::findOrFail($id);
        $sub_subjects = Subject::where('category_id', $id)->get();
        $sub_cat_subjects = Subject::where('subCategory_id', $id)->get();
        $subject_video = Subject::find($id);
        return view('web.pages.subjects', compact('subjects', 'drives', 'ads', 'ad2s', 'ad3s', 'sub_subjects', 'sub_cat_subjects', 'category', 'categories', 'subject_video', 'generalSetting'));
    }

    public function exam($id)
    {
        $generalSetting = GeneralSetting::first();
        $categories = Category::get();
        $ads = Ad::first();
        $ad2s = Ad2::first();
        $ad3s = Ad3::first();
        $drives = Drive::get();
        $subject = Subject::find($id);
        $exam = Exam::findOrFail($id);
        $examAnswers = ExamAnser::where('exam_id',$id)->paginate(5);
        return view('web.pages.exam', compact('subject','examAnswers','exam', 'drives', 'ads', 'ad2s', 'ad3s', 'categories', 'generalSetting'));
    }

    public function subject_details($id)
    {
        $generalSetting = GeneralSetting::first();
        $categories = Category::get();
        $subject = Subject::find($id);
        $exam_id = Exam::where('subject_id',$subject->id)->value('id');
        $ads = Ad::first();
        $ad2s = Ad2::first();
        $ad3s = Ad3::first();
        $drives = Drive::get();
        $catId = $subject->subCategory_id;
        $sub_cat_subjects = Subject::where('subCategory_id', $catId)
            ->where('id', '!=', $id)
            ->latest()->take(6)->get();
        return view('web.pages.subject_details', compact('subject','exam_id', 'drives', 'ads', 'ad2s', 'ad3s', 'categories', 'generalSetting', 'sub_cat_subjects'));
    }

    public function subject_content($id)
    {
        $generalSetting = GeneralSetting::first();
        $categories = Category::get();
        $ads = Ad::first();
        $ad2s = Ad2::first();
        $ad3s = Ad3::first();
        $drives = Drive::get();
        $subject = Subject::find($id);
        return view('web.pages.subject_content', compact('subject', 'drives', 'ads', 'ad2s', 'ad3s', 'categories', 'generalSetting'));
    }

    public function sub_cat_subjects($id)
    {
        $generalSetting = GeneralSetting::first();
        $categories = Category::get();
        $category = Category::find($id);
        $ads = Ad::first();
        $ad2s = Ad2::first();
        $ad3s = Ad3::first();
        $drives = Drive::get();
        $sub_cat_subject = SubCategory::find($id);
        $sub_cat_subjects = Subject::where('subCategory_id', $id)->get();
        return view('web.pages.sub_cat_subjects', compact('sub_cat_subjects', 'drives', 'ads', 'ad2s', 'ad3s', 'sub_cat_subject', 'categories', 'generalSetting', 'category'));
    }

    public function subjectsAll()
    {
        $generalSetting = GeneralSetting::first();
        $categories = Category::get();
        $ads = Ad::first();
        $ad2s = Ad2::first();
        $ad3s = Ad3::first();
        $drives = Drive::get();
        $subjects = Subject::latest()->take(12)->get();
        return view('web.pages.subjectsAll', compact('subjects', 'drives', 'ads', 'ad2s', 'ad3s', 'categories', 'generalSetting'));
    }

    public function download($id)
    {
        $generalSetting = GeneralSetting::first();
        $categories = Category::get();
        $ads = Ad::first();
        $ad2s = Ad2::first();
        $ad3s = Ad3::first();
        $drives = Drive::get();
        $subject = Subject::find($id);
        return view('web.pages.download', compact('subject', 'drives', 'ads', 'ad2s', 'ad3s', 'categories', 'generalSetting'));
    }

    public function drives()
    {
        $generalSetting = GeneralSetting::first();
        $categories = Category::get();
        $ads = Ad::first();
        $ad2s = Ad2::first();
        $ad3s = Ad3::first();
        $drives = Drive::get();
        return view('web.pages.drives', compact('drives', 'ads', 'ad2s', 'ad3s', 'categories', 'generalSetting'));
    }

    public function driveFiles($id)
    {
        $generalSetting = GeneralSetting::first();
        $categories = Category::get();
        $ads = Ad::first();
        $ad2s = Ad2::first();
        $ad3s = Ad3::first();
        $drive = Drive::findOrFail($id);
        $driveFiles = DriveFile::where('drive_id',$id)->get();
        return view('web.pages.driveFiles', compact('drive','driveFiles', 'ads', 'ad2s', 'ad3s', 'categories', 'generalSetting'));
    }

    public function driveFiles_content($id)
    {
        $generalSetting = GeneralSetting::first();
        $categories = Category::get();
        $ads = Ad::first();
        $ad2s = Ad2::first();
        $ad3s = Ad3::first();
        $drive = Drive::get();
        $driveFile = DriveFile::findOrFail($id);
        return view('web.pages.driveFiles_content', compact('driveFile', 'drive', 'ads', 'ad2s', 'ad3s', 'categories', 'generalSetting'));
    }

    public function index()
    {
        $generalSetting = GeneralSetting::first();
        $categories = Category::get();
        $ads = Ad::first();
        $ad2s = Ad2::first();
        $ad3s = Ad3::first();
        return view('web.pages.home', compact('generalSetting','categories','ads','ad2s','ad3s'));
    }

    public function bookDrive()
    {
        $generalSetting = GeneralSetting::first();
        $categories = Category::get();
        $ads = Ad::first();
        $ad2s = Ad2::first();
        $ad3s = Ad3::first();
        $bookDrives = BookDrive::get();
        return view('web.pages.bookDrives', compact('bookDrives', 'ads', 'ad2s', 'ad3s', 'categories', 'generalSetting'));
    }

    public function bookDriveFile($id)
    {
        $generalSetting = GeneralSetting::first();
        $categories = Category::get();
        $ads = Ad::first();
        $ad2s = Ad2::first();
        $ad3s = Ad3::first();
        $bookDrive = BookDrive::findOrFail($id);
        $bookDriveFiles = BookDriveFile::where('bookDrive_id',$id)->get();
        return view('web.pages.bookDriveFiles', compact('bookDrive','bookDriveFiles', 'ads', 'ad2s', 'ad3s', 'categories', 'generalSetting'));
    }

    public function bookDriveFile_content($id)
    {
        $generalSetting = GeneralSetting::first();
        $categories = Category::get();
        $ads = Ad::first();
        $ad2s = Ad2::first();
        $ad3s = Ad3::first();
        $drive = Drive::get();
        $bookDriveFile = BookDriveFile::findOrFail($id);
        return view('web.pages.bookDriveFile_content', compact('bookDriveFile', 'drive', 'ads', 'ad2s', 'ad3s', 'categories', 'generalSetting'));
    }

    public function bookDownload($id)
    {
        $generalSetting = GeneralSetting::first();
        $categories = Category::get();
        $ads = Ad::first();
        $ad2s = Ad2::first();
        $ad3s = Ad3::first();
        $drives = Drive::get();
        $bookDownload = BookDriveFile::find($id);
        return view('web.pages.bookDownload', compact('bookDownload', 'drives', 'ads', 'ad2s', 'ad3s', 'categories', 'generalSetting'));
    }
}
