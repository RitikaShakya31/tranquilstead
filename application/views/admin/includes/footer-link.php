<!-- JAVASCRIPT -->
<!-- Right bar overlay-->
<div class="rightbar-overlay"></div>
<script src="<?= base_url() ?>assets/admin/libs/jquery/jquery.min.js"></script>
<script src="<?= base_url() ?>assets/admin/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url() ?>assets/admin/libs/metismenu/metisMenu.min.js"></script>
<script src="<?= base_url() ?>assets/admin/libs/simplebar/simplebar.min.js"></script>
<script src="<?= base_url() ?>assets/admin/libs/node-waves/waves.min.js"></script>

<!-- apexcharts -->
<script src="<?= base_url() ?>assets/admin/libs/apexcharts/apexcharts.min.js"></script>

<!-- dashboard init -->
<script src="<?= base_url() ?>assets/admin/js/pages/dashboard.init.js"></script>

<!-- App js -->
<script src="<?= base_url() ?>assets/admin/js/app.js"></script>

<!-- Required datatable js -->
<script src="<?= base_url() ?>assets/admin/libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>assets/admin/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<!-- Buttons examples -->
<script src="<?= base_url() ?>assets/admin/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url() ?>assets/admin/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>assets/admin/libs/jszip/jszip.min.js"></script>
<script src="<?= base_url() ?>assets/admin/libs/pdfmake/build/pdfmake.min.js"></script>
<script src="<?= base_url() ?>assets/admin/libs/pdfmake/build/vfs_fonts.js"></script>
<script src="<?= base_url() ?>assets/admin/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="<?= base_url() ?>assets/admin/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="<?= base_url() ?>assets/admin/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>

<!-- Responsive examples -->
<script src="<?= base_url() ?>assets/admin/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url() ?>assets/admin/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

<!-- Datatable init js -->
<script src="<?= base_url() ?>assets/admin/js/pages/datatables.init.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/ckeditor5/40.0.0/ckeditor.min.js" integrity="sha512-Zyl/SvrviD3rEMVNCPN+m5zV0PofJYlGHnLDzol2kM224QpmWj9p5z7hQYppmnLFhZwqif5Fugjjouuk5l1lgA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
      <?php 
    if (sessionId('success_status')) {
    ?>
        Swal.fire({
            title: '<?= sessionId('success_status') ?>!',
            text: '<?= sessionId('msg') ?>',
            icon: '<?= sessionId('success_status') ?>',
            confirmButtonText: 'Done'
        })
    <?php
    }
    ?>
</script>


<script>
	ClassicEditor
		.create( document.querySelector( '#editor' ) )
		.then( editor => {
			window.editor = editor;
		} )
		.catch( error => {
			console.error( 'There was a problem initializing the editor.', error );
		} );
</script>
