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
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Suppliers</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="d-flex justify-content-end">
            <a href="<?php echo site_url('/supplier/create') ?>" class="btn btn-success mb-2">Create Supplier</a>
        </div>
        <div class="mt-3">
            <table class="table table-bordered" id="suppliers-list">
                <thead>
                <tr>
                    <th>#ID</th>
                    <th>Name</th>
                    <th>Document</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php if ($suppliers): ?>
                    <?php foreach ($suppliers as $supplier): ?>
                        <tr>
                            <td><?php echo $supplier['id']; ?></td>
                            <td><?php echo $supplier['name']; ?></td>
                            <td><?php echo $supplier['document']; ?></td>
                            <td>
                                <a href="<?php echo base_url('supplier/edit/' . $supplier['id']); ?>"
                                   class="btn btn-primary btn-sm">Edit</a>
                                <a href="<?php echo base_url('supplier/delete/' . $supplier['id']); ?>"
                                   class="btn btn-danger btn-sm">Delete</a>
                                <a href="<?php echo base_url('bankaccount/list/' . $supplier['id']); ?>"
                                   class="btn btn-warning btn-sm">Bank Accounts</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
                </tbody>
            </table>
        </div>

    </section>

</div>



