<footer class="main-footer">
    <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 3.0.4
    </div>
</footer>
<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<script src="<?php echo base_url(); ?>/assets/plugins/jquery/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/dist/js/adminlte.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/plugins/bs-stepper/js/bs-stepper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/additional-methods.min.js"></script>
<script>

    $(function () {
        $('#suppliers-list').DataTable();
        $('#zipcode').mask('00000-000');
        $(':input[name=document]').mask(CpfCnpjMaskBehavior, cpfCnpjpOptions);

        $(".add-row").click(function () {
            var agency = "<td>" + $("#agency").val() + "</td>";
            var account = "<td>" + $("#account").val() + "</td>";
            var bank = "<td>" + $("#bank :selected").val() + "</td>";
            var bank_description = "<td>" + $("#bank :selected").text().split("-")[1] + "</td>";
            var button_delete = "<td><button type='button' class='btn btn-danger btn-sm btnDelete'>Delete</button></td>";
            var markup = "<tr>" + agency + account + bank + bank_description + button_delete + "</tr>";
            $("#banks tbody").append(markup);
            generateBankAccount();
            $("#agency").val("");
            $("#account").val("");
            $("#bank option:first").attr('selected', 'selected');
        });

        $("#banks").on('click', '.btnDelete', function () {
            $(this).closest('tr').remove();
        });

    });

    document.addEventListener('DOMContentLoaded', function () {
        window.stepper = new Stepper(document.querySelector('.bs-stepper'))
    });

    var CpfCnpjMaskBehavior = function (val) {
            return val.replace(/\D/g, '').length <= 11 ? '000.000.000-009' : '00.000.000/0000-00';
        },
        cpfCnpjpOptions = {
            onKeyPress: function (val, e, field, options) {
                field.mask(CpfCnpjMaskBehavior.apply({}, arguments), options);
            }
        };

    $("#findCep").click(function () {
        var cep = $("#zipcode").val().replace(/[^0-9]/, '');
        if (cep) {
            var url = 'https://viacep.com.br/ws/' + cep + '/json/';
            $.ajax({
                url: url,
                dataType: 'jsonp',
                crossDomain: true,
                contentType: "application/json",
                success: function (json) {
                    if (json.logradouro) {
                        $("input[name=address]").val(json.logradouro);
                        $("input[name=district]").val(json.bairro);
                        $("input[name=city]").val(json.localidade);
                        $("input[name=state]").val(json.uf);
                    }
                }
            });
        }
    });

    function generateBankAccount() {
        var myRows = {myRows: []};

        var $th = $('#banks th');
        $('#banks tbody tr').each(function (i, tr) {
            var obj = {}, $tds = $(tr).find('td');
            $th.each(function (index, th) {
                obj[$(th).text()] = $tds.eq(index).text();
            });
            delete obj.Action
            myRows.myRows.push(obj);
        });

        $('#bank_accounts').val(JSON.stringify(myRows.myRows));
    }

    if ($("#form_supplier").length > 0) {
        $("#form_supplier").validate({
            rules: {
                name: {
                    required: true,
                },
                email: {
                    required: true,
                    email: true,
                },
                document: {
                    required: true,
                },
                address: {
                    required: true,
                },
                number: {
                    required: true,
                },
                district: {
                    required: true,
                },
                city: {
                    required: true,
                },
                zipcode: {
                    required: true,
                },
                phone: {
                    required: true,
                },

            },
            messages: {
                name: {
                    required: "Name is required.",
                },
                email: {
                    required: "Email is required.",
                    email: "It does not seem to be a valid email.",
                },
                document: {
                    required: "Document is required.",
                },
                address: {
                    required: "Address is required.",
                },
                number: {
                    required: "Number is required.",
                },
                district: {
                    required: "District is required.",
                },
                city: {
                    required: "City is required.",
                },
                zipcode: {
                    required: "Zipcode is required.",
                },
                phone: {
                    required: "Phone is required.",
                },
            },
        })
    }

    if ($("#form_bankaccount").length > 0) {
        $("#form_bankaccount").validate({
            rules: {
                agency: {
                    required: true,
                },
                account: {
                    required: true,
                },
                bank: {
                    required: true,
                },
            },
            messages: {
                agency: {
                    required: "Agency is required.",
                },
                account: {
                    required: "Account is required.",
                },
                bank: {
                    required: "Bank is required.",
                },
            },
        })
    }

</script>
</body>
</html>