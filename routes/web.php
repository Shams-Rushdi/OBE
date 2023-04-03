<?php
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AluminiApplicationController;
use App\Http\Controllers\AlumniController;
use App\Http\Controllers\UniversalController;
use App\Http\Controllers\ApprovalController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\ChangeProfileController;
use App\Http\Controllers\CommitteeController;
use App\Http\Controllers\CommitteeCategoryController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\CourseCategoryController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\JobApplicationController;
use App\Http\Controllers\JobCategoryController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\NoticeController;
use App\Http\Controllers\PassingYearController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\RolePermissionController;
use App\Http\Controllers\SpeakerController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\WorkshopCategoryController;
use App\Http\Controllers\WorkshopController;
use App\Http\Controllers\SiteSettingController;
use App\Http\Controllers\WorkshopApplicationController;
use App\Http\Controllers\EventApplicationController;
use App\Http\Controllers\AdvertisementController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/optimize', function() {
    Artisan::call('route:cache');
    Artisan::call('config:clear');
    Artisan::call('optimize:clear');
    return 'Your application Cache cleared!';
});


Route::get('/', function () {
    return view('auth.login');
})->middleware('guest');




Auth::routes();

Route::group(['middleware' => ['role:SuperAdmin|Admin|Teacher']], function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('basic-settings', [SiteSettingController::class, 'index'])->name('basic.index');
    Route::post('basic-setting', [SiteSettingController::class, 'store'])->name('basic.store');
    Route::get('basic-settings/create', [SiteSettingController::class, 'create'])->name('basic.create');
    Route::get('basic-settings/{basic-settings}', [SiteSettingController::class, 'show'])->name('basic.show');
    Route::post('basic-settings', [SiteSettingController::class, 'update'])->name('basic.update');
    Route::delete('basic-settings/{basic-settings}', [SiteSettingController::class, 'destroy'])->name('basic.destroy');
    
Route::resources([
    'admin'=> AdminController::class,
    'superadmin'=> SuperAdminController::class,
    'teacher'=> TeacherController::class,


    'permission'=> PermissionController::class,
    'role'=> RoleController::class,
    'role-permission'=> RolePermissionController::class,
    ]);
});

Route::get('/search/admin', [App\Http\Controllers\AdminController::class, 'search'])->name('admin.search');
Route::get('/search/teacher', [App\Http\Controllers\TeacherController::class, 'search'])->name('teacher.search');
Route::get('/search/alumni', [App\Http\Controllers\AlumniController::class, 'search'])->name('alumni.search');
Route::get('/search/student', [App\Http\Controllers\StudentController::class, 'search'])->name('student.search');

Route::group(['middleware' => ['role:Student']], function () {
    Route::get('/profile/student', [StudentController::class,'ProfileUpdate'])->name('student.profile');
    Route::put('/profile/student', [StudentController::class,'ProfileUpdateSubmit'])->name('student.profile.submit');
   
});
Route::group(['middleware' => ['role:Student|Alumni']], function () {
    Route::get('dashboard', [App\Http\Controllers\StudentController::class, 'Dashboard'])->name('student_dashboard');

    
    Route::get('/pub/user', [PublicController::class,'index'])->name('public.user');
    Route::get('/pub/user/{show}', [PublicController::class,'show'])->name('public.show');
    Route::put('/pub/user', [PublicController::class,'update'])->name('public.user.update');

    //search
    Route::get('/pub/search', [PublicController::class,'search'])->name('public.search');
});

Route::group(['middleware' => ['role:Alumni', 'expire']], function () {
    Route::get('/alumni/dashboard', [App\Http\Controllers\StudentController::class, 'Dashboard'])->name('alumni_dashboard');
    Route::get('/profile/alumni', [AlumniController::class,'ProfileUpdate2'])->name('alumni.profile');

    Route::put('/profile/alumni', [AlumniController::class,'ProfileUpdateSubmit'])->name('alumni.profile.submit');

    Route::get('/jobs/myjob',[JobController::class,'myjob'])->name('myjob.alumni');
    Route::get('/jobs/myjob/details/{id}',[JobController::class,'myJobDetails'])->name('myjob.alumni.details');
});

Route::group(['middleware' => ['role:SuperAdmin|Admin|Teacher|Student|Alumni']], function () {
    Route::resources([
        'student'=> StudentController::class,
        'alumni'=> AlumniController::class,
        'event' => EventController::class,
        'plans' => PlanController::class,
        'notices' => NoticeController::class,
        'jobs' => JobController::class,
        'categories' => CategoryController::class,
        'blog' => BlogController::class,
        'workshops' => WorkshopController::class,
        'speakers' => SpeakerController::class,
        'jobapplications' => JobApplicationController::class,
        'jobcategories' => JobCategoryController::class,
        'aluminiapplications' => AluminiApplicationController::class,
        'workshopcategories' => WorkshopCategoryController::class,
        'departments' => DepartmentController::class,
        'passingyears' => PassingYearController::class,
        'workshopapplication' => WorkshopApplicationController::class,
        'eventapplication' => EventApplicationController::class,
        'advertisements' => AdvertisementController::class,
        'committee' => CommitteeController::class,
        'committeecategory' => CommitteeCategoryController::class,
        'course' => CourseController::class,
        'coursecategory' => CourseCategoryController::class
    ]);
    
});
Route::get('/profile/alumni', [AlumniController::class,'ProfileUpdate2'])->name('alumni.profile');
Route::put('/profile/alumni', [AlumniController::class,'ProfileUpdateSubmit'])->name('alumni.profile.submit');



Route::get('/blogs/pageindex', [BlogController::class,'blogindexpage'])->name('blog.blogindexpage');
Route::get('/events/pageindex', [EventController::class,'eventindexpage'])->name('event.eventindexpage');
Route::get('/job/pageindex', [JobController::class,'jobindexpage'])->name('job.jobindexpage');
Route::get('/workshop/pageindex', [WorkshopController::class,'workshopindexpage'])->name('workshop.workshopindexpage');
Route::get('/courses/index', [CourseController::class,'courseindexpage'])->name('course.courseindexpage');

Route::get('/status/update', [StudentController::class,'updateStatus'])->name('users.update.status');
Route::get('job/admin/{show}',[JobController::class,'adminShow'])->name('job.admin.show');
Route::get('workshop/admin/{show}',[WorkshopController::class,'adminShow'])->name('workshop.admin.show');
Route::get('app/jobs/list', [JobController::class,'card'])->name('jobs.list');
Route::post('my/jobs/store', [JobController::class,'myjobStore'])->name('myjobs.store');
Route::get('app/events/list', [WorkshopController::class,'card'])->name('workshops.list');
Route::get('myjobapplication', [JobApplicationController::class,'myJob'])->name('myjobapplications');
Route::get('apply/alumini', [AluminiApplicationController::class,'apply'])->name('alumini.apply');
Route::get('welcome/alumini', [AluminiApplicationController::class,'welcome'])->name('alumini.welcome');
Route::get('howtopay/workshop', [WorkshopController::class,'howtopay'])->name('howtopay.workshop');

Route::post('alumini/application/approve/{id}', [AluminiApplicationController::class, 'approveApplication'])->name('approve.application');
Route::post('alumini/application/decline/{id}', [AluminiApplicationController::class, 'declineApplication'])->name('decline.application');

Route::post('workshop/application/approve/{id}', [WorkshopApplicationController::class, 'approveApplication'])->name('approve.workshopapplication');
Route::post('workshop/application/decline/{id}', [WorkshopApplicationController::class, 'declineApplication'])->name('decline.workshopapplication');

Route::post('event/application/approve/{id}', [EventApplicationController::class, 'approveApplication'])->name('approve.eventapplication');
Route::post('event/application/decline/{id}', [EventApplicationController::class, 'declineApplication'])->name('decline.eventapplication');

// Approval Section
Route::get('approval/job/{id}', [ApprovalController::class, 'jobView'])->name('approval.job');
Route::post('approval/job/{id}', [ApprovalController::class, 'jobUpdate'])->name('approval.job.update');

Route::get('approval/blog/{id}', [ApprovalController::class, 'blogView'])->name('approval.blog');
Route::post('approval/blog/{id}', [ApprovalController::class, 'blogUpdate'])->name('approval.blog.update');

//all pending jobs
Route::get('approval/jobs', [ApprovalController::class, 'job'])->name('approval.jobs');
Route::get('approval/blogs', [ApprovalController::class, 'blog'])->name('approval.blogs');

//admin profile
Route::get('/adminprofile/{id}', [ChangeProfileController::class,'ProfileUpdate'])->name('admin.profile');
Route::post('/adminprofile', [ChangeProfileController::class,'ProfileUpdateSubmit'])->name('user.profile.submit');

Route::get('/password/{id}', [ChangePasswordController::class,'PasswordUpdate'])->name('admin.password');
Route::post('/password', [ChangePasswordController::class,'PasswordUpdateSubmit'])->name('user.pass.submit');


Route::get('/cv/{id}', [JobApplicationController::class,'ProfileUpdate'])->name('cv.edit');
Route::post('/cv', [JobApplicationController::class,'store'])->name('cv.update');

Route::get('expire', [UniversalController::class, 'expire'])->name('expire');
Route::post('payment', [UniversalController::class, 'payment'])->name('payment');
Route::get('all/approvals', [UniversalController::class, 'approval'])->name('alumni.approval');
Route::get('approval/alumni/{id}', [UniversalController::class, 'approvalView'])->name('alumni.approval.show');
Route::post('approval/transaction/{id}', [UniversalController::class, 'approvalUpdate'])->name('alumni.approval.update');















