<?php $title = ''; ?>
<?php ob_start(); ?>
<main>
    <?php require_once 'partials/frontend/logo.php';?>
    <?php require_once 'partials/frontend/nav.php';?>
    <section class="story">
        <h1>l'histoire de biarritz</h1>
        <div class="story-1">
            <div>
                <img src="../../assets/img/img-story1.jpg" alt="">
            </div>
            <div>On ne connait que très peu de choses de l’histoire de Biarritz avant le XIIIème siècle.
                Les plus anciennes mentions de la paroisse de Biarritz remontent à la fin du XIIème siècle. On
                sait qu’alors, les premières maisons qui formaient cette paroisse étaient regroupées autour de
                l’actuel Port-Vieux. En 1199, un acte concernant le roi d’Angleterre et le port de Biarritz1
                fait
                état de l’existence de la pêche à la baleine sur cette partie du littoral. Le duché d’Aquitaine
                était en effet à cette époque sous domination anglaise depuis le mariage en 1152 d’Aliénor
                d’Aquitaine avec le futur roi d’Angleterre Henri II Plantagenêt, qui accéda au trône en 1154.
                A cette époque, on voit paraitre un certain nombre de documents attestant de la pêche à la
                baleine et d’actes qui en dépendent. En 1261, un texte du Pape Célestin III affirme l’existence
                d’une dîme sur les baleines et le 2 juin 1270, une charte signée par Edouard d’Angleterre
                « qui autorise les « hommes » du port de Biarritz et d’Angleterre ainsi que leurs héritiers à
                pêcher et à prendre des baleines, des baleineaux et des cavelats, mâles ou femelles, contre
                quinze livres morlanes à verser au château de Bayonne et une baleine si lui ou ses héritiers
                venaient à séjourner en Gascogne »</div>
        </div>
        <div class="story-2">
            <div>
                <img src="../../assets/img/img-story2.jpg" alt="">
            </div>
            <div>Jusqu’au début du XIXème siècle, la société enregistre un déclin de ses activités
                maritime, entrainant une importante diminution démographique. La plus forte chute est
                enregistrée au milieu du XVIIème siècle, pour remonter ensuite progressivement. On estime
                qu’en un siècle, Biarritz a perdu 44% de sa population, soit huit cent personnes. Les raisons
                sont essentiellement liées à la forte mortalité due entre autre aux épidémies, le faible taux de
                natalité, renforcé par l’absence fréquente des hommes, et l’émigration face au déclin de
                l’économie maritime et la faible productivité des terres. La pêche n’est plus assez rentable, la
                production des terres agricoles est trop irrégulière. En 1764, on ne compte que sept
                propriétaires de bateaux et quarante-deux marins, pour environ mille habitants
                . La configuration du port devient également problématique. On condamne les conditions d’entrée,
                trop risquées voire impossibles pour les plus grosses embarcations ; il est de ce fait abandonné
                à la fin du XVIIème siècle et est désormais nommé « Port-Vieux ».</div>
        </div>
        <div class="story-3">
            <div class="ok">C’est le Second Empire qui va cependant faire connaître les bains de mer et propulser
                Biarritz sur le devant de la scène nationale, voire internationale. En effet, la famille impériale
                va faire de la petite station son lieu de villégiature pour l’été. Tout commence lors de la
                guerre carliste qui sévit en Espagne. En 1834, la comtesse Eugénie de Montijo délaisse San
                Sebastian avec sa mère et sa sœur. Elle a alors huit ans et toutes trois viennent se réfugier en
                France. La renommée de Biarritz en Espagne est telle que la comtesse vient s’y baigner et
                s’entiche de la station. Puis en 1853, la jeune comtesse Eugénie, devenue impératrice, reçoit à
                l’occasion de son mariage avec Napoléon III une lettre de la municipalité de Biarritz. Cette
                dernière la remercie du bien qu’elle et sa famille ont apporté à la ville, et du réconfort donné
                aux pauvres et aux malheureux lors de leurs passages sur la côte pendant la jeunesse de la
                nouvelle impératrice. Cette lettre eut grand effet sur Eugénie, et seize mois plus tard, en 1854,
                le couple impérial passait son premier été à Biarritz. Le séjour se déroula du 21 juillet au 19
                août pour l’Empereur et jusqu’au 19 septembre pour l’Impératrice, au Château Gramont, dont
                le propriétaire était le père du maire de Bayonne, Jules Labat. Napoléon est séduit par la petite
                ville, et à la demande de sa femme, décide d’acheter quatre hectares de terrain face à la mer.</div>
            <div>
                <img src="../../assets/img/img-story3.jpg" alt="">
            </div>
        </div>
    </section>
    <?php require_once 'partials/frontend/footer.php';?>
</main>
<?php $content = ob_get_clean(); ?>
<?php require 'layout.php'; ?>

