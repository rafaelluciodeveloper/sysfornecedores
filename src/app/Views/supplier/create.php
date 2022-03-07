<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>
                        Suppliers
                    </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Suppliers</a></li>
                        <li class="breadcrumb-item active">Create</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <form action="<?php echo site_url('/supplier/store') ?>" method="POST" id="form_supplier">
            <div class="card card-outline card-primary pl-3 pr-3 pt-3">
                <div class="row">
                    <div class="form-group col-3">
                        <label for="document">Document</label>
                        <input type="text" class="form-control" id="document"
                               name="document">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-6">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-4">
                        <label for="zipcode">Zipcode</label>
                        <div class="input-group">
                            <input type="text" class="form-control rounded-0" name="zipcode"
                                   id="zipcode" placeholder="00000-000">
                            <span class="input-group-append">
                                <button type="button" class="btn btn-info btn-flat" id="findCep">
                                    <i class="fa fa-search-location"></i>
                                </button>
                            </span>
                        </div>
                    </div>
                    <div class="form-group col-6">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" id="address"
                               name="address">
                    </div>
                    <div class="form-group col-1">
                        <label for="number">Number</label>
                        <input type="text" class="form-control" id="number"
                               name="number">
                    </div>
                    <div class="form-group col-2">
                        <label for="district">District</label>
                        <input type="text" class="form-control" id="district"
                               name="district">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-8 ">
                        <label for="complement">Complement</label>
                        <input type="text" class="form-control" id="complement"
                               name="complement">
                    </div>
                    <div class="form-group col-3">
                        <label for="city">City</label>
                        <input type="text" class="form-control" id="city"
                               name="city">
                    </div>
                    <div class="form-group col-1">
                        <label for="state">State</label>
                        <input type="text" class="form-control" id="state"
                               name="state">
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-6">
                        <label for="ie">IE</label>
                        <input type="text" class="form-control" id="ie" name="ie">
                    </div>
                    <div class="form-group col-6">
                        <label for="im">IM</label>
                        <input type="text" class="form-control" id="im" name="im">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-3">
                        <label for="phone">Phone</label>
                        <input type="text" class="form-control" id="phone" name="phone">
                    </div>
                    <div class="form-group  col-3">
                        <label for="cell_phone">Cell phone</label>
                        <input type="text" class="form-control" id="cell_phone"
                               name="cell_phone">
                    </div>
                    <div class="form-group  col-6">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" id="email"
                               name="email">
                    </div>
                </div>
            </div>
            <div class="card card-outline card-primary pl-3 pr-3 pt-3">
                <div class="row">
                    <div class="form-group col-3">
                        <label for="staticEmail2">Agency</label>
                        <input type="text" class="form-control" id="agency">
                    </div>
                    <div class="form-group col-3">
                        <label for="inputPassword2">Account</label>
                        <input type="text" class="form-control" id="account">
                    </div>
                    <div class="form-group col-6">
                        <label for="type">Bank</label>
                        <select name="bank" class="form-control" id="bank">
                            <option value=""></option>
                            <?php foreach ($banks as $bank): ?>
                                <option value="<?php echo $bank["code"]; ?>"><?php echo $bank["description"]; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-12 text-right">
                        <button type="button" class="btn btn-success add-row">Add</button>
                    </div>
                </div>
                <table class="table table-striped" id="banks">
                    <thead>
                    <tr>
                        <th>Agency</th>
                        <th>Account</th>
                        <th colspan="2">Bank</th>
                        <th style="width: 40px">Action</th>
                    </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
                <input type="hidden" id="bank_accounts" name="bank_accounts">
            </div>
            <div class="row">
                <div class="col-12 text-right">
                    <button type="submit" class="btn btn-primary col-1">
                        Save
                    </button>
                </div>
            </div>

        </form>
    </section>
</div>






