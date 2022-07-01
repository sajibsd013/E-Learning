<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jodit/3.13.4/jodit.es2018.min.js"></script> -->


<script src='<?php echo $root ?>/assets/jodit/jodit.es2018.min.js'></script>
<script src='<?php echo $root ?>/assets/js/app.js'></script>
<script src='<?php echo $root ?>/assets/chart/chart.min.js'></script>
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> -->
<script src='<?php echo $root ?>/assets/bootstrap/js/bootstrap.bundle.js'></script>

<script>
    const j_editor = () => {
        const editor = Jodit.make('#editor');
    }

    const editor_id = document.getElementById('editor');
    if (editor_id) {
        const editor = Jodit.make('#editor');
    }
</script>