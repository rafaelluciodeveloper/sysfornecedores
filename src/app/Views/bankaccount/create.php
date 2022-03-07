<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>
                        Bank Accounts | Supplier : <?php echo $supplier['document']; ?>
                        - <?php echo $supplier['name']; ?>
                    </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Bank Accounts</a></li>
                        <li class="breadcrumb-item active">Create</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <form action="<?php echo site_url('/bankaccount/store') ?>" method="POST" id="form_bankaccount">
            <input type="hidden" name="supplier_id" value="<?php echo $supplier["id"] ?>">
            <div class="card card-outline card-primary pl-3 pr-3 pt-3">
                <div class="row">
                    <div class="form-group col-3">
                        <label for="staticEmail2">Agency</label>
                        <input type="text" class="form-control" id="agency" name="agency">
                    </div>
                    <div class="form-group col-3">
                        <label for="inputPassword2">Account</label>
                        <input type="text" class="form-control" id="account" name="account">
                    </div>
                    <div class="form-group col-6">
                        <label for="type">Bank</label>
                        <select class="form-control" id="bank" name="bank" required>
                            <option value=""></option>
                            <?php foreach ($banks as $bank): ?>
                                <option value="<?php echo $bank["id"]; ?>"><?php echo $bank["description"]; ?></option>
                            <?php endforeach; ?>
                        </select>
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






