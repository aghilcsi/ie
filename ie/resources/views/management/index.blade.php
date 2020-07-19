@extends('templates.management-template')
@section('content')
    <div class="mgm-users">
        <div class="col-md-12 mgm-user-container">
            <div class="row">
                <div class="col-md-8 user-right-side">
                    <div class="card">
                        <div class="card-header">کاربران سایت</div>
                        <div class="card-body">
                            <div style="margin-bottom: 10px;" class="text-center">
                                <span>تعداد کاربران سایت:</span>
                                <span>1254</span>
                            </div>
                            <div class="user-tbl">
                                <div class="row">
                                    <div>
                                        <table style="text-align: center;" class="table table-striped">
                                            <thead class="thead-dark">
                                            <tr>
                                                <th>ردیف</th>
                                                <th>نام شهر</th>
                                                <th>تعداد کاربران</th>
                                            </tr>
                                            </thead>
                                            <tbody class="green">
                                            <tr>
                                                <td>1</td>
                                                <td>تهران</td>
                                                <td>120</td>
                                            </tr>
                                            <tr>
                                                <td>1</td>
                                                <td>تهران</td>
                                                <td>120</td>
                                            </tr>
                                            <tr>
                                                <td>1</td>
                                                <td>تهران</td>
                                                <td>120</td>
                                            </tr>
                                            <tr>
                                                <td>1</td>
                                                <td>تهران</td>
                                                <td>120</td>
                                            </tr>
                                            <tr>
                                                <td>1</td>
                                                <td>تهران</td>
                                                <td>120</td>
                                            </tr>
                                            <tr>
                                                <td>1</td>
                                                <td>تهران</td>
                                                <td>120</td>
                                            </tr>
                                            <tr>
                                                <td>1</td>
                                                <td>تهران</td>
                                                <td>120</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div>
                                        <table style="text-align: center;" class="table table-striped">
                                            <thead class="thead-dark">
                                            <tr>
                                                <th>ردیف</th>
                                                <th>نام شهر</th>
                                                <th>تعداد کاربران</th>
                                            </tr>
                                            </thead>
                                            <tbody class="yellow">
                                            <tr>
                                                <td>1</td>
                                                <td>تهران</td>
                                                <td>120</td>
                                            </tr>
                                            <tr>
                                                <td>1</td>
                                                <td>تهران</td>
                                                <td>120</td>
                                            </tr>
                                            <tr>
                                                <td>1</td>
                                                <td>تهران</td>
                                                <td>120</td>
                                            </tr>
                                            <tr>
                                                <td>1</td>
                                                <td>تهران</td>
                                                <td>120</td>
                                            </tr>
                                            <tr>
                                                <td>1</td>
                                                <td>تهران</td>
                                                <td>120</td>
                                            </tr>
                                            <tr>
                                                <td>1</td>
                                                <td>تهران</td>
                                                <td>120</td>
                                            </tr>
                                            <tr>
                                                <td>1</td>
                                                <td>تهران</td>
                                                <td>120</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div>
                                        <table style="text-align: center;" class="table table-striped">
                                            <thead class="thead-dark">
                                            <tr>
                                                <th>ردیف</th>
                                                <th>نام شهر</th>
                                                <th>تعداد کاربران</th>
                                            </tr>
                                            </thead>
                                            <tbody class="red">
                                            <tr>
                                                <td>1</td>
                                                <td>تهران</td>
                                                <td>120</td>
                                            </tr>
                                            <tr>
                                                <td>1</td>
                                                <td>تهران</td>
                                                <td>120</td>
                                            </tr>
                                            <tr>
                                                <td>1</td>
                                                <td>تهران</td>
                                                <td>120</td>
                                            </tr>
                                            <tr>
                                                <td>1</td>
                                                <td>تهران</td>
                                                <td>120</td>
                                            </tr>
                                            <tr>
                                                <td>1</td>
                                                <td>تهران</td>
                                                <td>120</td>
                                            </tr>
                                            <tr>
                                                <td>1</td>
                                                <td>تهران</td>
                                                <td>120</td>
                                            </tr>
                                            <tr>
                                                <td>1</td>
                                                <td>تهران</td>
                                                <td>120</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 user-left-side">
                    <div class="col-md-12" >
                        <div class="card">
                            <div class="card-header">
                                نرخ ورود کاربران
                            </div>
                            <div class="card-body">
                                <canvas id="sales-chart"></canvas>
                            </div>
                        </div>
                    </div><!-- /# column -->
                    <div class="col-md-12" >
                        <div class="card">
                            <div class="card-header">
                                نرخ بارگذاری آگهی ها
                            </div>
                            <div class="card-body">
                                <canvas id="sales-chart1"></canvas>
                            </div>
                        </div>
                    </div><!-- /# column -->
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">آگهی های سایت</div>
                        <div class="card-body">
                            <div class="text-center">
                                <span>تعداد آگهی های موجود:</span>
                                <span>254895</span>
                            </div>
                            <div class="row" style="margin-top: 15px;">
                                <div class="col-md-4">
                                    <table style="text-align: center;" class="table table-striped">
                                        <thead class="thead-dark">
                                        <tr>
                                            <th>پوشاک</th>
                                            <th>450</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                            <td>شلوار جین</td>
                                            <td>100</td>
                                        </tr>
                                            <tr>
                                                <td>شلوار جین</td>
                                                <td>100</td>
                                            </tr>
                                            <tr>
                                                <td>شلوار جین</td>
                                                <td>100</td>
                                            </tr>
                                            <tr>
                                                <td>شلوار جین</td>
                                                <td>100</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-md-4">
                                    <table style="text-align: center;" class="table table-striped">
                                        <thead class="thead-dark">
                                        <tr>
                                            <th>پوشاک</th>
                                            <th>450</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>شلوار جین</td>
                                            <td>100</td>
                                        </tr>
                                        <tr>
                                            <td>شلوار جین</td>
                                            <td>100</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-md-4">
                                    <table style="text-align: center;" class="table table-striped">
                                        <thead class="thead-dark">
                                        <tr>
                                            <th>پوشاک</th>
                                            <th>450</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>شلوار جین</td>
                                            <td>100</td>
                                        </tr>
                                        <tr>
                                            <td>شلوار جین</td>
                                            <td>100</td>
                                        </tr>
                                        <tr>
                                            <td>شلوار جین</td>
                                            <td>100</td>
                                        </tr>
                                        <tr>
                                            <td>شلوار جین</td>
                                            <td>100</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-md-4">
                                    <table style="text-align: center;" class="table table-striped">
                                        <thead class="thead-dark">
                                        <tr>
                                            <th>پوشاک</th>
                                            <th>450</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>شلوار جین</td>
                                            <td>100</td>
                                        </tr>
                                        <tr>
                                            <td>شلوار جین</td>
                                            <td>100</td>
                                        </tr>
                                        <tr>
                                            <td>شلوار جین</td>
                                            <td>100</td>
                                        </tr>
                                        <tr>
                                            <td>شلوار جین</td>
                                            <td>100</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-md-4">
                                    <table style="text-align: center;" class="table table-striped">
                                        <thead class="thead-dark">
                                        <tr>
                                            <th>پوشاک</th>
                                            <th>450</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>شلوار جین</td>
                                            <td>100</td>
                                        </tr>
                                        <tr>
                                            <td>شلوار جین</td>
                                            <td>100</td>
                                        </tr>
                                        <tr>
                                            <td>شلوار جین</td>
                                            <td>100</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-md-4">
                                    <table style="text-align: center;" class="table table-striped">
                                        <thead class="thead-dark">
                                        <tr>
                                            <th>پوشاک</th>
                                            <th>450</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>شلوار جین</td>
                                            <td>100</td>
                                        </tr>
                                        <tr>
                                            <td>شلوار جین</td>
                                            <td>100</td>
                                        </tr>
                                        <tr>
                                            <td>شلوار جین</td>
                                            <td>100</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@section('js')
    <script src="{{asset('js/management/dashboard/Chart.bundle.min.js')}}"></script>
    <script src="{{asset('js/management/dashboard/chartjs-init.js')}}"></script>
@stop