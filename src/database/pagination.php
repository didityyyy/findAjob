<?php require_once  $_SERVER['DOCUMENT_ROOT'] . '/DR/src/database/db.php'; ?>
<!-- <?php //if($total_pages > 1) : ?>
<ul class="pagination flex-x" id="pagination">
<input type="hidden" id="total_pages" value="<?php //echo $total_pages; ?>">
    <li><a id="first" href="?page=1"><i class="fa-solid fa-angles-left"></i></a></li>
    <li class="<?php //if ($page <= 1) {
                    //echo 'disabled';
                //} ?>">
        <a  id="prev" href="<?php //if ($page <= 1) {
                        //echo '#';
                    //} else {
                        //echo "?page=" . ($page - 1);
                    //} ?>"><i class="fa-solid fa-angle-left"></i></a>
    </li>
    <li class="<?php //if ($page >= $total_pages) {
                    //echo 'disabled';
                //} ?>">
        <a  id="next" href="<?php //if ($page >= $total_pages) {
                       // echo '#';
                    //} else {
                        //echo "?page=" . ($page + 1);
                    //} ?>"><i class="fa-solid fa-angle-right"></i></a>
    </li>
     <li><a  id="last" href="?page=<?php //echo $total_pages; ?>"><i class="fa-solid fa-angles-right"></i></a></li>
</ul> <?php //endif?> -->

<?php //if($total_pages > 1) : ?>
    <?php if(isset($_POST['totalPages'])>1) {
       // if($total_pages > 1) {
            echo "hello";
        //}
    } ?>
<ul class="pagination flex-x" id="pagination">
<input type="hidden" id="total_pages" value="<?php echo $total_pages; ?>">
    <li><a id="first"><i class="fa-solid fa-angles-left"></i></a></li>
    <li class="">
        <a  id="prev" ><i class="fa-solid fa-angle-left"></i></a>
    </li>
    <li class="">
        <a  id="next"><i class="fa-solid fa-angle-right"></i></a>
    </li>
     <li><a  id="last"><i class="fa-solid fa-angles-right"></i></a></li>
</ul> <?php //endif?>
<?php //echo 'hello'; ?>

<script type="text/javascript" src="/DR/assets/js/pagination.js?v=<?php echo time(); ?>"></script>
