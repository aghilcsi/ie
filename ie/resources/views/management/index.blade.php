@extends('templates.management-template')
@section('template-title')
    داشبورد
@stop
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
                                <span>{{$users}}</span>
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
                                                <td>{{isset($cities[0])?$cities[0]->city:'---'}}</td>
                                                <td>{{isset($cities[0])?$cities[0]->users: 0}}</td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>{{isset($cities[1])?$cities[1]->city:'---'}}</td>
                                                <td>{{isset($cities[1])?$cities[1]->users: 0}}</td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>{{isset($cities[2])?$cities[2]->city:'---'}}</td>
                                                <td>{{isset($cities[2])?$cities[2]->users: 0}}</td>
                                            </tr>
                                            <tr>
                                                <td>4</td>
                                                <td>{{isset($cities[4])?$cities[4]->city:'---'}}</td>
                                                <td>{{isset($cities[4])?$cities[4]->users: 0}}</td>
                                            </tr>
                                            <tr>
                                                <td>5</td>
                                                <td>{{isset($cities[4])?$cities[4]->city:'---'}}</td>
                                                <td>{{isset($cities[4])?$cities[4]->users: 0}}</td>
                                            </tr>
                                            <tr>
                                                <td>6</td>
                                                <td>{{isset($cities[5])?$cities[5]->city:'---'}}</td>
                                                <td>{{isset($cities[5])?$cities[5]->users: 0}}</td>
                                            </tr>
                                            <tr>
                                                <td>7</td>
                                                <td>{{isset($cities[6])?$cities[6]->city:'---'}}</td>
                                                <td>{{isset($cities[6])?$cities[6]->users: 0}}</td>
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
                                                <td>8</td>
                                                <td>{{isset($cities[7])?$cities[7]->city:'---'}}</td>
                                                <td>{{isset($cities[7])?$cities[7]->users: 0}}</td>
                                            </tr>
                                            <tr>
                                                <td>9</td>
                                                <td>{{isset($cities[8])?$cities[8]->city:'---'}}</td>
                                                <td>{{isset($cities[8])?$cities[8]->users: 0}}</td>
                                            </tr>
                                            <tr>
                                                <td>10</td>
                                                <td>{{isset($cities[9])?$cities[9]->city:'---'}}</td>
                                                <td>{{isset($cities[9])?$cities[9]->users: 0}}</td>
                                            </tr>
                                            <tr>
                                                <td>11</td>
                                                <td>{{isset($cities[10])?$cities[10]->city:'---'}}</td>
                                                <td>{{isset($cities[10])?$cities[10]->users: 0}}</td>
                                            </tr>
                                            <tr>
                                                <td>12</td>
                                                <td>{{isset($cities[11])?$cities[11]->city:'---'}}</td>
                                                <td>{{isset($cities[11])?$cities[11]->users: 0}}</td>
                                            </tr>
                                            <tr>
                                                <td>13</td>
                                                <td>{{isset($cities[12])?$cities[12]->city:'---'}}</td>
                                                <td>{{isset($cities[12])?$cities[12]->users: 0}}</td>
                                            </tr>
                                            <tr>
                                                <td>14</td>
                                                <td>{{isset($cities[13])?$cities[13]->city:'---'}}</td>
                                                <td>{{isset($cities[13])?$cities[13]->users: 0}}</td>
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
                                                <td>15</td>
                                                <td>{{isset($cities[14])?$cities[14]->city:'---'}}</td>
                                                <td>{{isset($cities[14])?$cities[14]->users: 0}}</td>
                                            </tr>
                                            <tr>
                                                <td>16</td>
                                                <td>{{isset($cities[15])?$cities[15]->city:'---'}}</td>
                                                <td>{{isset($cities[15])?$cities[15]->users: 0}}</td>
                                            </tr>
                                            <tr>
                                                <td>17</td>
                                                <td>{{isset($cities[16])?$cities[16]->city:'---'}}</td>
                                                <td>{{isset($cities[16])?$cities[16]->users: 0}}</td>
                                            </tr>
                                            <tr>
                                                <td>18</td>
                                                <td>{{isset($cities[17])?$cities[17]->city:'---'}}</td>
                                                <td>{{isset($cities[17])?$cities[17]->users: 0}}</td>
                                            </tr>
                                            <tr>
                                                <td>19</td>
                                                <td>{{isset($cities[18])?$cities[18]->city:'---'}}</td>
                                                <td>{{isset($cities[18])?$cities[18]->users: 0}}</td>
                                            </tr>
                                            <tr>
                                                <td>20</td>
                                                <td>{{isset($cities[19])?$cities[19]->city:'---'}}</td>
                                                <td>{{isset($cities[19])?$cities[19]->users: 0}}</td>
                                            </tr>
                                            <tr>
                                                <td>21</td>
                                                <td>{{isset($cities[20])?$cities[20]->city:'---'}}</td>
                                                <td>{{isset($cities[20])?$cities[20]->users: 0}}</td>
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
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                نرخ ورود کاربران
                            </div>
                            <div class="card-body">
                                <canvas id="sales-chart"></canvas>
                                <div id="registered_users" style="display: none !important;">{{$registered_users}}</div>
                            </div>
                        </div>
                    </div><!-- /# column -->
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                نرخ بارگذاری آگهی ها
                            </div>
                            <div class="card-body">
                                <canvas id="sales-chart1"></canvas>
                                <div id="com_rate" style="display: none !important;">{{$coms}}</div>
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
                                <span>{{$com_count}}</span>
                            </div>
                            <div class="row" style="margin-top: 15px;">
                                @if(count($result_for_cat_table) > 0)
                                    @foreach($result_for_cat_table as $item)
                                        <?php $cat_id = $item[0] ?>
                                        <div class="col-md-4">
                                            <table style="text-align: center;" class="table table-striped">
                                                <thead class="thead-dark">
                                                <tr>
                                                    <th>{{$item[1]}}</th>
                                                    <th>{{$item[2]}}</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @if(count($item) > 3)
                                                    @for($i = 3; $i <= count($item)-1; $i+=2)
                                                        <tr>
                                                            <td>{{$item[$i]}}</td>
                                                            <td>{{$item[$i+1]}}</td>
                                                        </tr>
                                                    @endfor
                                                @endif
                                                <tr>
                                                    <form action="{{action('managmentController@new_subcat')}}" method="post">
                                                        {{csrf_field()}}
                                                        <td colspan="2">
                                                            <div class="row">
                                                                <div class="col-md-9">
                                                                    <input type="text" name="subcat" class="form-control" placeholder="زیر دسته بندی جدید" required max="50" min="5">
                                                                    <input type="hidden" name="cat" value="<?php echo $cat_id ?>">
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <button type="submit" class="btn btn-block btn-primary">ثبت</button>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </form>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    @endforeach
                                @endif
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