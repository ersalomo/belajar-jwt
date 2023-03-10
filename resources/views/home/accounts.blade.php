 <x-home-layout>
     <div class="content">
         <div class="buy-form">
             <div class="row">
                 <div class="col-sm-4 col-3">
                     <h4 class="page-title">Employee</h4>
                 </div>
                 <div class="col-sm-8 col-9 text-end m-b-20">
                     <a href="add-employee.html" class="btn btn-primary float-right btn-rounded"><i
                             class="fas fa-plus"></i>
                         Add Employee</a>
                 </div>
             </div>
             <div class="row filter-row">
                 <div class="col-sm-6 col-md-3">
                     <div class="form-group">
                         <label class="focus-label">Employee ID</label>
                         <input type="text" class="form-control">
                     </div>
                 </div>
                 <div class="col-sm-6 col-md-3">
                     <div class="form-group">
                         <label class="focus-label">Employee Name</label>
                         <input type="text" class="form-control">
                     </div>
                 </div>
                 <div class="col-sm-6 col-md-3">
                     <div class="form-group bg-hover select-focus">
                         <label class="focus-label">Role</label>
                         <select class="select floating select2-hidden-accessible" data-select2-id="select2-data-4-qxvx"
                             tabindex="-1" aria-hidden="true">
                             <option data-select2-id="select2-data-6-va9d">Select Role</option>
                             <option>Staff</option>
                             <option>Staff</option>
                             <option>Staff</option>
                             <option>Accountant</option>
                             <option>Receptionist</option>
                         </select><span class="select2 select2-container select2-container--default" dir="ltr"
                             data-select2-id="select2-data-5-y28v" style="width: 100%;"><span class="selection"><span
                                     class="select2-selection select2-selection--single" role="combobox"
                                     aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false"
                                     aria-labelledby="select2-bl3z-container"
                                     aria-controls="select2-bl3z-container"><span class="select2-selection__rendered"
                                         id="select2-bl3z-container" role="textbox" aria-readonly="true"
                                         title="Select Role">Select Role</span><span class="select2-selection__arrow"
                                         role="presentation"><b role="presentation"></b></span></span></span><span
                                 class="dropdown-wrapper" aria-hidden="true"></span></span>
                     </div>
                 </div>
                 <div class="col-sm-6 col-md-3">
                     <a href="#" class="btn btn-success btn-block mt-4 mb-1"> Search </a>
                 </div>
             </div>
             <div class="row">
                 <div class="col-md-12">
                     <div class="table-responsive">
                         <table class="table table-striped custom-table">
                             <thead>
                                 <tr>
                                     <th style="min-width:200px;">Name</th>
                                     <th>Employee ID</th>
                                     <th>Email</th>
                                     <th>Mobile</th>
                                     <th style="min-width: 110px;">Join Date</th>
                                     <th>Role</th>
                                     <th class="text-end">Action</th>
                                 </tr>
                             </thead>
                             <tbody>
                                 <tr>
                                     <td>
                                         <img width="28" height="28" src="/assets/img/user.jpg"
                                             class="rounded-circle" alt="">
                                         <h2>Albina Simonis</h2>
                                     </td>
                                     <td>SF-0001</td>
                                     <td><a href="/cdn-cgi/l/email-protection" class="__cf_email__"
                                             data-cfemail="6f0e030d06010e1c06020001061c2f0a170e021f030a410c0002">[email&nbsp;protected]</a>
                                     </td>
                                     <td>828-634-2744</td>
                                     <td>7 May 2015</td>
                                     <td>
                                         <span class="custom-badge status-green">Staff</span>
                                     </td>
                                     <td class="text-end">
                                         <div class="dropdown dropdown-action">
                                             <a href="#" class="action-icon dropdown-toggle"
                                                 data-bs-toggle="dropdown" aria-expanded="false"><i
                                                     class="fas fa-ellipsis-v"></i></a>
                                             <div class="dropdown-menu dropdown-menu-right">
                                                 <a class="dropdown-item" href="edit-employee.html"><i
                                                         class="fas fa-pencil-alt m-r-5"></i> Edit</a>
                                                 <a class="dropdown-item" href="#" data-bs-toggle="modal"
                                                     data-bs-target="#delete_employee"><i
                                                         class="fas fa-trash-alt m-r-5"></i> Delete</a>
                                             </div>
                                         </div>
                                     </td>
                                 </tr>
                                 <tr>
                                     <td>
                                         <img width="28" height="28" src="assets/img/user.jpg"
                                             class="rounded-circle" alt="">
                                         <h2>Cristina Groves</h2>
                                     </td>
                                     <td>DR-0001</td>
                                     <td><a href="/cdn-cgi/l/email-protection" class="__cf_email__"
                                             data-cfemail="5635243f25223f383731243920332516332e373b263a337835393b">[email&nbsp;protected]</a>
                                     </td>
                                     <td>928-344-5176</td>
                                     <td>1 Jan 2013</td>
                                     <td>
                                         <span class="custom-badge status-blue">Doctor</span>
                                     </td>
                                     <td class="text-end">
                                         <div class="dropdown dropdown-action">
                                             <a href="#" class="action-icon dropdown-toggle"
                                                 data-bs-toggle="dropdown" aria-expanded="false"><i
                                                     class="fas fa-ellipsis-v"></i></a>
                                             <div class="dropdown-menu dropdown-menu-right">
                                                 <a class="dropdown-item" href="edit-employee.html"><i
                                                         class="fas fa-pencil-alt m-r-5"></i> Edit</a>
                                                 <a class="dropdown-item" href="#" data-bs-toggle="modal"
                                                     data-bs-target="#delete_employee"><i
                                                         class="fas fa-trash-alt m-r-5"></i> Delete</a>
                                             </div>
                                         </div>
                                     </td>
                                 </tr>
                                 <tr>
                                     <td>
                                         <img width="28" height="28" src="/assets/img/user.jpg"
                                             class="rounded-circle" alt="">
                                         <h2>Mary Mericle</h2>
                                     </td>
                                     <td>SF-0003</td>
                                     <td><a href="/cdn-cgi/l/email-protection" class="__cf_email__"
                                             data-cfemail="a4c9c5d6ddc9c1d6cdc7c8c1e4c1dcc5c9d4c8c18ac7cbc9">[email&nbsp;protected]</a>
                                     </td>
                                     <td>603-831-4983</td>
                                     <td>27 Dec 2017</td>
                                     <td>
                                         <span class="custom-badge status-grey">Accountant</span>
                                     </td>
                                     <td class="text-end">
                                         <div class="dropdown dropdown-action">
                                             <a href="#" class="action-icon dropdown-toggle"
                                                 data-bs-toggle="dropdown" aria-expanded="false"><i
                                                     class="fas fa-ellipsis-v"></i></a>
                                             <div class="dropdown-menu dropdown-menu-right">
                                                 <a class="dropdown-item" href="edit-employee.html"><i
                                                         class="fas fa-pencil-alt m-r-5"></i> Edit</a>
                                                 <a class="dropdown-item" href="#" data-bs-toggle="modal"
                                                     data-bs-target="#delete_employee"><i
                                                         class="fas fa-trash-alt m-r-5"></i> Delete</a>
                                             </div>
                                         </div>
                                     </td>
                                 </tr>
                                 <tr>
                                     <td>
                                         <img width="28" height="28" src="/assets/img/user.jpg"
                                             class="rounded-circle" alt="">
                                         <h2>Haylie Feeney</h2>
                                     </td>
                                     <td>SF-0002</td>
                                     <td><a href="/cdn-cgi/l/email-protection" class="__cf_email__"
                                             data-cfemail="7810190114111d1e1d1d161d01381d00191508141d561b1715">[email&nbsp;protected]</a>
                                     </td>
                                     <td>616-774-4962</td>
                                     <td>21 Apr 2017</td>
                                     <td>
                                         <span class="custom-badge status-grey">Laboratorist</span>
                                     </td>
                                     <td class="text-end">
                                         <div class="dropdown dropdown-action">
                                             <a href="#" class="action-icon dropdown-toggle"
                                                 data-bs-toggle="dropdown" aria-expanded="false"><i
                                                     class="fas fa-ellipsis-v"></i></a>
                                             <div class="dropdown-menu dropdown-menu-right">
                                                 <a class="dropdown-item" href="edit-employee.html"><i
                                                         class="fas fa-pencil-alt m-r-5"></i> Edit</a>
                                                 <a class="dropdown-item" href="#" data-bs-toggle="modal"
                                                     data-bs-target="#delete_employee"><i
                                                         class="fas fa-trash-alt m-r-5"></i> Delete</a>
                                             </div>
                                         </div>
                                     </td>
                                 </tr>
                                 <tr>
                                     <td>
                                         <img width="28" height="28" src="/assets/img/user.jpg"
                                             class="rounded-circle" alt="">
                                         <h2>Zoe Butler</h2>
                                     </td>
                                     <td>SF-0001</td>
                                     <td><a href="/cdn-cgi/l/email-protection" class="__cf_email__"
                                             data-cfemail="ea90858f889f9e868f98aa8f928b879a868fc4898587">[email&nbsp;protected]</a>
                                     </td>
                                     <td>444-555-9999</td>
                                     <td>19 May 2012</td>
                                     <td>
                                         <span class="custom-badge status-grey">Pharmacist</span>
                                     </td>
                                     <td class="text-end">
                                         <div class="dropdown dropdown-action">
                                             <a href="#" class="action-icon dropdown-toggle"
                                                 data-bs-toggle="dropdown" aria-expanded="false"><i
                                                     class="fas fa-ellipsis-v"></i></a>
                                             <div class="dropdown-menu dropdown-menu-right">
                                                 <a class="dropdown-item" href="edit-employee.html"><i
                                                         class="fas fa-pencil-alt m-r-5"></i> Edit</a>
                                                 <a class="dropdown-item" href="#" data-bs-toggle="modal"
                                                     data-bs-target="#delete_employee"><i
                                                         class="fas fa-trash-alt m-r-5"></i> Delete</a>
                                             </div>
                                         </div>
                                     </td>
                                 </tr>
                             </tbody>
                         </table>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </x-home-layout>
