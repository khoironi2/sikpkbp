    <footer>
        <div class="container mt-3">
            <div class="row justify-content-center">
                <p style="font-size: 12px;">Copyright <a href="<?= base_url('') ?>">SIKPKBP</a> 2020</p>
            </div>
        </div>
    </footer>
    <script src="<?= base_url('assets/js/jquery-3.5.1.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/bootstrap.min.js') ?>"></script>

    <script src="<?= base_url('assets/vendors/datatables/jquery.dataTables.min.js'); ?>"></script>
    <script src="<?= base_url('assets/vendors/datatables/dataTables.bootstrap4.min.js'); ?>"></script>

    <script>
        $(document).ready(function() {
            $('#datatable').DataTable();
        });
    </script>



    </body>

    </html>