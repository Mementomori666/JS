<div id="Layer1">
    <div id="Layer1_Container">
        <div class="arch_menu" id="archMenu">
            <?php
            $str = '';
            foreach ($allReleases as $year){
                $str .= '<div class="arch_menu_one_year">';
                $str .= '<div class="arch_menu_year_text">' . $year['pubyear'] . '</div>';
                foreach($year['releases'] as $release){
                    $str .= '<a class="arch_menu_link"
                        href="/page/arch/' .$year['pubyear'] . '/' . $release['num_mag'] . '">'
                        . $release['num_mag'] . '</a>';
                    $str .= '<br>';
                }
                $str .= '</div>';
            }
            echo $str;
            ?>
        </div>
        <pre>
        <?php var_dump($article) ?>
        <br>
        <br>
        <?php //var_dump($allReleases) ?>
        </pre>
    </div>
</div>
<?php
$breadcrumbs = new Breadcrumbs();
echo $breadcrumbs->getBreadcrumbs($breadArr);
?>