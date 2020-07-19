<div class="filter-container">
    <form action="{{action('commercialController@commercials_of_people')}}" method="get">
        <div class="row">
            <!-- category & price -->
            <div class="col-md-4">
                <!--category -->
                <div class="row">
                    <!-- category -->
                    <div class="form-group">
                        <label>دسته بندی ها</label>
                        <select name="gls" id="com-form-cat" class="form-control">
                            <option value="0">انتخاب کنید...</option>
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <!-- subcategory -->
                    <div class="form-group" style="margin-right: 5px">
                        <label style="color: transparent">-</label>
                        <select name="vtq" id="com-form-subcat" class="form-control">
                            <option value="0">انتخاب کنید...</option>
                        </select>
                    </div>
                </div>
                <!--price -->
                <div class="row">
                    <!-- min price -->
                    <div class="form-group filter-price">
                        <label for="">بازه قیمت کالا</label>
                        <input type="number" name="dsp" class="form-control" placeholder="کف قیمت">
                    </div>
                    <!-- max price -->
                    <div class="form-group filter-price" style="margin-right: 5px">
                        <label for="" style="color: transparent">-</label>
                        <input type="number" name="esp" class="form-control" placeholder="سقف قیمت">
                    </div>
                </div>
            </div>
            <!-- date & brand -->
            <div class="col-md-4">
                <!-- date -->
                <div class="form-group">
                    <label for="">از این تاریخ به بعد</label>
                    <input type="text" name="fee" readonly class="form-control" id="filter-date">
                </div>
                <!-- brand -->
                <div class="form-group">
                    <label for="">برند کالا</label>
                    <input type="text" name="brd" class="form-control">
                </div>
            </div>
            <!-- year & city -->
            <div class="col-md-4">
                <!-- year -->
                <div class="form-group">
                    <label for="">کمینه سال تولید کالا</label>
                    <input type="number" name="yrr" class="form-control">
                </div>
                <!-- city -->
                <div class="form-group">
                    <label for="">استان</label>
                    <select name="xaa" class="form-control">
                        <?php
                        $cities = get_cities();
                        foreach ($cities as $city) {
                            $s = ($city['code'] == $user_city->city) ? "selected" : "";
                            echo "<option value='" . $city['code'] . "' " . $s . ">" . $city['name'] . "</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-success btn-block">جست و جو کن ...</button>
    </form>
</div>