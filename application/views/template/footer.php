</body>

</html>
<script src="<?= base_url('vendor/temp/') ?>dist/js/app.js"></script>
<script src="<?= base_url('vendor/temp/') ?>dist/js/me.js"></script>
<?php if ($this->session->flashdata('pesan') == true or $this->session->flashdata('login') == true) : ?>
 <script>
  $(document).ready(function() {
   $("#myModal").modal('show');
  });
 </script>
<?php endif; ?>
