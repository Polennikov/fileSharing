<?php
require 'dataPostersMethod.php';
?>
<section>
    <div class="ContentDataSection">
        <div class="DataSection">
            <? foreach ($massPoster as $post) { ?>
                <div class="ContentDataBlock">
                    <div class="DataBlock">
                        <div class='titleContent'>
                            <? if ($_SESSION['role'] == true) { ?>
                                <h2><a class='linkPost'
                                       href='../public/updatePostAdmin.php?id_poster=<? echo $post[2] ?>&id_users=<? echo $post[3] ?>'><? echo $post[0]; ?></a>
                                </h2>
                            <? } else { ?>
                                <h2> <? echo $post[0]; ?> </h2>
                            <? } ?>
                        </div>
                        <div class="commentsContent">
                            <? echo $post[1]; ?>
                        </div>
                        <br>
                        <div>Файлы:</div>
                        <? foreach ($massFilePoster as $filePost) {
                            if ($post[2] == $filePost[2]) {
                                ?>
                                <div>
                                    <a href='../public/methods/saveFilePost.php?filename=../uploads/<? echo $filePost[0] ?>'><? echo $filePost[0] ?></a>
                                </div>
                                <?
                            }
                        } ?>
                        <br>
                        <div class="endPostContent">
                            <div>
                                <? echo $post[4]; ?>
                            </div>
                            <div>
                                <? echo $objectUsers->getNameUsers(null, $post[3]); ?>
                            </div>
                        </div>
                    </div>
                </div>
            <? } ?>
        </div>
    </div>
</section>
<?php
require '../lib/style/styleError.php';