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
                        <li class="breadcrumb-item active">Edit</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <form action="<?php echo site_url('/supplier/update') ?>" method="POST" id="form_supplier">
            <input type="hidden" name="id" id="id" value="<?php echo $supplier_obj['id']; ?>">
            <div class="card card-outline card-primary pl-3 pr-3 pt-3">
                <div class="row">
                    <div class="form-group col-3">
                        <label for="document">Document</label>
                        <input type="text" class="form-control" id="document"
                               name="document" value="<?php echo $supplier_obj['document']; ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-6">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name"
                               value="<?php echo $supplier_obj['name']; ?>">
                    </div>
                    <div class="form-group col-6">
                        <label for="company_name">Company name</label>
                        <input type="text" class="form-control" id="company_name" name="company_name"
                               value="<?php echo $supplier_obj['company_name']; ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-2">
                        <label for="zipcode">Zipcode</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control rounded-0" name="zipcode"
                                   id="zipcode" placeholder="00000-000" value="<?php echo $supplier_obj['zipcode']; ?>">
                            <span class="input-group-append">
                                                    <button type="button" class="btn btn-info btn-flat" id="findCep">
                                                        <i class="fa fa-search-location"></i>
                                                    </button>
                                                </span>
                        </div>
                    </div>
                    <div class="form-group col-7">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" id="address"
                               name="address" value="<?php echo $supplier_obj['address']; ?>">
                    </div>
                    <div class="form-group col-1">
                        <label for="number">Number</label>
                        <input type="text" class="form-control" id="number"
                               name="number" value="<?php echo $supplier_obj['number']; ?>">
                    </div>
                    <div class="form-group col-2">
                        <label for="district">District</label>
                        <input type="text" class="form-control" id="district"
                               name="district" value="<?php echo $supplier_obj['district']; ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-8 ">
                        <label for="complement">Complement</label>
                        <input type="text" class="form-control" id="complement"
                               name="complement" value="<?php echo $supplier_obj['complement']; ?>">
                    </div>
                    <div class="form-group col-3">
                        <label for="city">City</label>
                        <input type="text" class="form-control" id="city"
                               name="city" value="<?php echo $supplier_obj['city']; ?>">
                    </div>
                    <div class="form-group col-1">
                        <label for="state">State</label>
                        <input type="text" class="form-control" id="state"
                               name="state" value="<?php echo $supplier_obj['state']; ?>">
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-6">
                        <label for="ie">IE</label>
                        <input type="text" class="form-control" id="ie" name="ie"
                               value="<?php echo $supplier_obj['ie']; ?>">
                    </div>
                    <div class="form-group col-6">
                        <label for="im">IM</label>
                        <input type="text" class="form-control" id="im" name="im"
                               value="<?php echo $supplier_obj['im']; ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-3">
                        <label for="phone">Phone</label>
                        <input type="text" class="form-control" id="phone" name="phone"
                               value="<?php echo $supplier_obj['phone']; ?>">
                    </div>
                    <div class="form-group  col-3">
                        <label for="cell_phone">Cell phone</label>
                        <input type="text" class="form-control" id="cell_phone"
                               name="cell_phone" value="<?php echo $supplier_obj['cell_phone']; ?>">
                    </div>
                    <div class="form-group  col-6">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" id="email"
                               name="email" value="<?php echo $supplier_obj['email']; ?>">
                    </div>
                </div>
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






