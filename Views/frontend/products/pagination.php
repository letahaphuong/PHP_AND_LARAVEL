<div class="row d-fex mt-5">
    <div class="col-4">
    </div>
    <div class="col-4 pagination">
        <?php
        if ($current_page > 3) {
            $first = 1;
            ?>
            <a class="btn" style="border: #1E1F29 solid 1px"
               href="?controller=product&limit=<?= $limit ?>&page=<?= $first ?>">First</a>
            <?php
        }

        if ($current_page > 1) {
            $prev_page = $current_page - 1;
            ?>
            <a class="btn" style="border: #1E1F29 solid 1px"
               href="?controller=product&limit=<?= $limit ?>&page=<?= $prev_page ?>"><</a>
            <?php
        }
        ?>
        <?php
        for ($num = 1;
             $num <= $total_page;
             $num++) { ?>
            <?php if ($num != $current_page) { ?>
                <?php if ($num > $current_page - 3 && $num < $current_page + 3) { ?>
                    <a class="btn " style="border: #1E1F29 solid 1px"
                       href="?controller=product&limit=<?= $limit ?>&page=<?= $num ?>"><?= $num ?></a>
                <?php } ?>
            <?php } else { ?>
                <strong class="btn bg-primary"><?= $num ?></strong>
            <?php } ?>
            <?php
        }
        ?>
        <?php
        if ($current_page <= $total_page - 1) {
            $next_page = $current_page + 1;
            ?>
            <a class="btn " style="border: #1E1F29 solid 1px"
               href="?controller=product&limit=<?= $limit ?>&page=<?= $next_page ?>"> ></a>
            <?php
        }
        if ($current_page < $total_page - 3) {
            $end_page = $total_page;
            ?>
            <a class="btn " style="border: #1E1F29 solid 1px"
               href="?controller=product&limit=<?= $limit ?>&page=<?= $end_page ?>">Last</a>
            <?php
        }
        ?>

        <!--        <a class="btn " href="?controller=home&limit=4&page=3">3</a>-->
    </div>
    <div class="col-4"></div>
</div>