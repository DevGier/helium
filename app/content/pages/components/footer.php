
      </div>
    </div>

    <script src="<?= getSiteURI() ?>/helium/tinymce/tinymce/tinymce.min.js" charset="utf-8"></script>

    <script>
      tinymce.init({
        selector: 'textarea#editor',
        height: 600,
        plugins: [
          'grid',
          'advlist autolink lists link image charmap print preview anchor',
          'searchreplace visualblocks code fullscreen',
          'insertdatetime table contextmenu paste code'
        ],
        toolbar: 'grid_insert grid_delete | code | insertfile undo redo | styleselect | bold italic | bullist numlist outdent indent | fontsizeselect | fullscreen',
        grid_preset: 'Bootstrap4',
        convert_urls : false,
      });
    </script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <script src="<?= getSiteURI() ?>/helium/js/main.js" charset="utf-8"></script>

  </body>
</html>
