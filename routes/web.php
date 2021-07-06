<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\UserContorller;
use App\Http\Controllers\backend\ProfileController;
use App\Http\Controllers\Backend\Setup\ExamTypeController;
use App\Http\Controllers\Backend\Setup\FeeAmountController;
use App\Http\Controllers\Backend\Setup\DesignationContorller;
use App\Http\Controllers\Backend\Setup\FeeCategoryController;
use App\Http\Controllers\Backend\Setup\StudentYearContorller;
use App\Http\Controllers\Backend\Setup\StudentClassController;
use App\Http\Controllers\Backend\Setup\StudentGroupContorller;
use App\Http\Controllers\Backend\Setup\StudentShiftContorller;
use App\Http\Controllers\Backend\Student\MonthlyFeeController;
use App\Http\Controllers\Backend\Student\StudentRegController;
use App\Http\Controllers\Backend\Setup\AssignSubjectController;
use App\Http\Controllers\Backend\Setup\SchoolSubjectController;
use App\Http\Controllers\Backend\Student\ExamFeeController;
use App\Http\Controllers\Backend\Student\StudentRollController;
use App\Http\Controllers\Backend\Student\RegistrationFeeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('admin.index');
})->name('dashboard');

Route::get('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');
// User Managment all routes
Route::prefix('users')->group(function () {

    Route::get('/view', [UserContorller::class, 'userView'])->name('user.view');
    Route::get('/add', [UserContorller::class, 'userAdd'])->name('users.add');
    Route::post('/store', [UserContorller::class, 'userStore'])->name('users.store');
    Route::get('/edit/{id}', [UserContorller::class, 'userEdit'])->name('users.edit');
    Route::post('/update/{id}', [UserContorller::class, 'userUpdate'])->name('users.update');
    Route::get('/delete/{id}', [UserContorller::class, 'userDelete'])->name('users.delete');
});

//User Profile and change password
Route::prefix('profiles')->group(function () {

    Route::get('/view', [ProfileController::class, 'profileView'])->name('profile.view');
    Route::get('/edit', [ProfileController::class, 'profileEdit'])->name('profile.edit');
    Route::post('/store', [ProfileController::class, 'profileStore'])->name('profile.store');
    Route::get('/pssword/view', [ProfileController::class, 'passwordView'])->name('password.view');
    Route::post('/pssword/update', [ProfileController::class, 'passwordUpdate'])->name('Password.Update1');
});

//Student Class Route
Route::prefix('setups')->group(function () {

    Route::get('student/class/view', [StudentClassController::class, 'profileView'])->name('student.class.view');
    Route::get('student/class/add', [StudentClassController::class, 'studentClassAdd'])->name('student.class.add');
    Route::post('student/class/store', [StudentClassController::class, 'studentClassStore'])->name('store.student.class');
    Route::get('student/class/edit/{id}', [StudentClassController::class, 'studentClassEdit'])->name('student.class.edit');
    Route::post('student/class/update/{id}', [StudentClassController::class, 'studentClassUpdate'])->name('update.student.class');
    Route::get('student/class/delete/{id}', [StudentClassController::class, 'studentClassDelete'])->name('student.class.delete');

    // Students Year Routes
    Route::get('student/year/view', [StudentYearContorller::class, 'viewYear'])->name('student.year.view');
    Route::get('student/year/add', [StudentYearContorller::class, 'StudentYearAdd'])->name('student.year.add');
    Route::post('student/year/store', [StudentYearContorller::class, 'studentYearStore'])->name('store.student.year');
    Route::get('student/year/edit/{id}', [StudentYearContorller::class, 'studentYearEdit'])->name('student.year.edit');
    Route::post('student/year/update{id}', [StudentYearContorller::class, 'studentYearUpdate'])->name('update.student.year');
    Route::get('student/year/delete/{id}', [StudentYearContorller::class, 'studentYearDelete'])->name('student.year.delete');

    // Students Group Routes
    Route::get('student/group/view', [StudentGroupContorller::class, 'viewGroup'])->name('student.group.view');
    Route::get('student/group/add', [StudentGroupContorller::class, 'studentGroupAdd'])->name('student.group.add');
    Route::post('student/group/store', [StudentGroupContorller::class, 'studentGroupStore'])->name('student.store.group');
    Route::get('student/group/edit/{id}', [StudentGroupContorller::class, 'studentGroupEdit'])->name('student.group.edit');
    Route::post('student/group/update/{id}', [StudentGroupContorller::class, 'studentGroupUpdate'])->name('update.student.group');
    Route::get('student/group/delete/{id}', [StudentGroupContorller::class, 'studentGroupDelete'])->name('student.group.delete');

    // Students Group Routes
    Route::get('student/shift/view', [StudentShiftContorller::class, 'viewShift'])->name('student.shift.view');
    Route::get('student/shift/add', [StudentShiftContorller::class, 'studentShiftAdd'])->name('student.shift.add');
    Route::post('student/shift/store', [StudentShiftContorller::class, 'studentShiftStore'])->name('student.shift.store');
    Route::get('student/shift/edit/{id}', [StudentShiftContorller::class, 'studentShiftEdit'])->name('student.shift.edit');
    Route::post('student/shift/update/{id}', [StudentShiftContorller::class, 'studentShiftUpdate'])->name('student.shift.update');
    Route::get('student/shift/delete/{id}', [StudentShiftContorller::class, 'studentShiftDelete'])->name('student.shift.delete');

    // Fee Category Routes
    Route::get('fee/category/view', [FeeCategoryController::class, 'viewFeeCategory'])->name('fee.category.view');
    Route::get('fee/category/add', [FeeCategoryController::class, 'feeCategoryAdd'])->name('fee.catagory.add');
    Route::post('fee/category/store', [FeeCategoryController::class, 'feeCategoryStore'])->name('fee.category.store');
    Route::get('fee/category/edit/{id}', [FeeCategoryController::class, 'feeCategoryEdit'])->name('fee.category.edit');
    Route::post('fee/category/update/{id}', [FeeCategoryController::class, 'feeCategoryUpdate'])->name('fee.category.update');
    Route::get('fee/category/delete/{id}', [FeeCategoryController::class, 'feeCategoryDelete'])->name('fee.category.delete');

    // Fee Category Amount Routes
    Route::get('fee/amount/view', [FeeAmountController::class, 'viewFeeAmount'])->name('fee.amount.view');
    Route::get('fee/amount/add', [FeeAmountController::class, 'feeAmountAdd'])->name('fee.amount.add');
    Route::post('fee/amount/store', [FeeAmountController::class, 'feeAmountStore'])->name('fee.amount.store');
    Route::get('fee/amount/edit/{id}', [FeeAmountController::class, 'feeAmountEdit'])->name('fee.amount.edit');
    Route::post('fee/amount/update/{id}', [FeeAmountController::class, 'feeAmountUpdate'])->name('fee.amount.update');
    Route::get('fee/amount/details/{id}', [FeeAmountController::class, 'feeAmounteDetails'])->name('fee.amount.details');

    //Exam Taype Routes
    Route::get('exam/type/view', [ExamTypeController::class, 'viewExamType'])->name('exam.type.view');
    Route::get('exam/type/add', [ExamTypeController::class, 'examTypeAdd'])->name('exam.type.add');
    Route::post('exam/type/store', [ExamTypeController::class, 'examTypeStore'])->name('exam.type.store');
    Route::get('exam/type/edit/{id}', [ExamTypeController::class, 'examTypeEdit'])->name('exam.type.edit');
    Route::post('exam/type/update/{id}', [ExamTypeController::class, 'examTypeUpdate'])->name('exam.type.update');
    Route::get('exam/type/delete/{id}', [ExamTypeController::class, 'examTypeDelete'])->name('exam.type.delete');

    //School Subject Routes
    Route::get('school/subject/view', [SchoolSubjectController::class, 'viewSchoolSubject'])->name('school.subject.view');
    Route::get('school/subject/add', [SchoolSubjectController::class, 'schoolSubjectAdd'])->name('school.subject.add');
    Route::post('school/subject/store', [SchoolSubjectController::class, 'schoolSubjectStore'])->name('school.subject.store');
    Route::get('school/subject/edit/{id}', [SchoolSubjectController::class, 'schoolSubjectEdit'])->name('school.subject.edit');
    Route::post('school/subject/update/{id}', [SchoolSubjectController::class, 'schoolSubjectUpdate'])->name('school.subject.update');
    Route::get('school/subject/delete/{id}', [SchoolSubjectController::class, 'schoolSubjectsDelete'])->name('school.subject.delete');

    // Assign Subject Routes
    Route::get('assign/subject/view', [AssignSubjectController::class, 'viewAssignSubject'])->name('assign.subject.view');
    Route::get('assign/subject/add', [AssignSubjectController::class, 'assignSubjectAdd'])->name('assign.subject.add');
    Route::post('assign/subject/store', [AssignSubjectController::class, 'assignSubjectStore'])->name('assign.subject.store');
    Route::get('assign/subject/edit/{id}', [AssignSubjectController::class, 'assignSubjectEdit'])->name('assign.subject.edit');
    Route::post('assign/subject/update/{id}', [AssignSubjectController::class, 'assignSubjectUpdate'])->name('assign.subject.update');
    Route::get('assign/subject/details/{id}', [AssignSubjectController::class, 'assignSubjectDetails'])->name('assign.subject.details');

    //Designation Routes
    Route::get('designation/view', [DesignationContorller::class, 'viewDesignatoion'])->name('designation.view');
    Route::get('designation/add', [DesignationContorller::class, 'designationAdd'])->name('designation.add');
    Route::post('designation/store', [DesignationContorller::class, 'designationStore'])->name('designation.store');
    Route::get('designation/edit/{id}', [DesignationContorller::class, 'designationEdit'])->name('designation.edit');
    Route::post('designation/update/{id}', [DesignationContorller::class, 'designationUpdate'])->name('designation.update');
    Route::get('designation/delete/{id}', [DesignationContorller::class, 'designationDelete'])->name('designation.delete');
});

// Student Registration Routes
Route::prefix('students')->group(function () {

    Route::get('reg/view', [StudentRegController::class, 'studentRegView'])->name('student.registration.view');
    Route::get('reg/Add', [StudentRegController::class, 'studentRegAdd'])->name('student.registration.add');
    Route::post('reg/Store', [StudentRegController::class, 'studentRegStore'])->name('store.student.registration');
    Route::get('year/class/wice', [StudentRegController::class, 'studentClassYearWice'])->name('student.class.year.wice');
    Route::get('reg/edit/{id}', [StudentRegController::class, 'studentReqEdit'])->name('student.registration.edit');
    Route::post('reg/update/{id}', [StudentRegController::class, 'studentRegUpdate'])->name('update.student.registration');
    Route::get('reg/promotion/{id}', [StudentRegController::class, 'studentReqPromotion'])->name('student.registration.promotion');
    Route::post('reg/update/promotion/{id}', [StudentRegController::class, 'studentUpdatePromotion'])->name('promotion.student.registration');
    Route::get('reg/details/{id}', [StudentRegController::class, 'studentRegDetails'])->name('details.student.registration');

    //Student Role Generate Routes
    Route::get('role/generate/view', [StudentRollController::class, 'studentRoleView'])->name('role.generate.view');
    Route::get('reg/getstudents', [StudentRollController::class, 'getStudent'])->name('student.registration.getstudents');
    Route::post('rolle/generate/store', [StudentRollController::class, 'generateRolleStore'])->name('roll.generate.store');

    //Registration Fee Routes
    Route::get('reg/fee/view', [RegistrationFeeController::class, 'registrationFeeView'])->name('registration.fee.view');
    Route::get('reg/fee/classwise', [RegistrationFeeController::class, 'regFeeClassData'])->name('student.registration.fee.classwise.get');
    Route::get('reg/fee/payslip', [RegistrationFeeController::class, 'regFeePayslip'])->name('student.registration.fee.payslip');

    //Monthly Fee Routes
    Route::get('monthly/fee/view', [MonthlyFeeController::class, 'monthlyFeeView'])->name('monthly.fee.view');
    Route::get('monthly/fee/classwise', [MonthlyFeeController::class, 'monthlyFeeClassData'])->name('student.monthly.fee.classwise.get');
    Route::get('monthly/fee/payslip', [MonthlyFeeController::class, 'monthlyFeePayslip'])->name('student.monthly.fee.payslip');

    //Exam Fee Routes
    Route::get('exam/fee/view', [ExamFeeController::class, 'examFeeView'])->name('exam.fee.view');
    Route::get('exam/fee/classwise', [ExamFeeController::class, 'examFeeClassData'])->name('student.exam.fee.classwise.get');
    Route::get('exam/fee/payslip', [ExamFeeController::class, 'examFeePayslip'])->name('student.exam.fee.payslip');
});
