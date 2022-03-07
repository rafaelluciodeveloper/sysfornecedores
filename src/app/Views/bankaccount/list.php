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
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Bank Accounts</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="d-flex justify-content-end">
            <a href="<?php echo site_url('/bankaccount/create/' . $supplier["id"]) ?>" class="btn btn-success mb-2">Create Bank Account</a>
        </div>
        <div class="mt-3">
            <table class="table table-bordered" id="suppliers-list">
                <thead>
                <tr>
                    <th>#ID</th>
                    <th>Agency</th>
                    <th>Account</th>
                    <th>Bank</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php if ($accounts): ?>
                    <?php foreach ($accounts as $account): ?>
                        <tr>
                            <td><?php echo $account['bid']; ?></td>
                            <td><?php echo $account['agency']; ?></td>
                            <td><?php echo $account['account']; ?></td>
                            <td><?php echo $account['description']; ?></td>
                            <td>
                                <a href="<?php echo base_url('bankaccount/edit/' . $account['bid']); ?>"
                                   class="btn btn-primary btn-sm">Edit</a>
                                <a href="<?php echo base_url('bankaccount/delete/' . $account['bid']); ?>"
                                   class="btn btn-danger btn-sm">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
                </tbody>
            </table>
        </div>

    </section>

</div>



