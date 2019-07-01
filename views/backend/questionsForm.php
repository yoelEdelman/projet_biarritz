<?php $title = 'Administration des questions - !'; ?>
<?php ob_start(); ?>
<div class="container-fluid">
    <?php require '././partials/backend/header.php'; ?>
    <div class="row my-3 index-content">
        <?php require '././partials/backend/nav.php'; ?>
        <section class="col-9">

            <header class="pb-3">
                <h4><?= (isset($_GET['question-id'])) ? 'Modifier une question' : 'Ajouter une question' ;?></h4>
            </header>

            <?php if (!empty($errors)): ?>
                <?php foreach($errors as $key => $error): ?>
                    <div class="bg-danger text-white p-2 mb-4">
                        <?= $error; ?>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>

            <div class="tab-content">
                <div class="tab-pane container-fluid active" id="infos" role="tabpanel">
                    <?php if (isset($_GET['question-id'])): ?>
                        <form action="index.php?page=admin-questions-form&question-id=<?= $question['id'];?>&action=edit" method="post" enctype="multipart/form-data">
                    <?php else: ?>
                        <form action="index.php?page=admin-questions-form" method="post" enctype="multipart/form-data">
                    <?php endif; ?>

                            <div class="form-group">
                                <label for="categories"> Catégorie <b class="text-danger">*</b></label>
                                <select multiple class="form-control" name="categories" id="categories" multiple="multiple">
                                    <?php foreach($categories as $key => $category): ?>
                                        <option value="<?= $category['id'];?>"
                                            <?php if (isset($_GET['question-id']) && $category['id'] == $question['category_id']): ?>
                                                selected="selected"
                                            <?php endif;?>
                                        ><?= $category['name']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="question">Question : <b class="text-danger">*</b></label>
                                <input class="form-control"  type="text" placeholder="Question" name="question" id="question" value="<?= isset($question) ? htmlentities($question['question']) : '';?>" />
                            </div>

                            <?php if (isset($_GET['question-id'])): ?>
                                <input class="form-control" type="hidden" name="question-id" id="question-id" value="<?= $question['id']; ?>"/>
                            <?php endif;?>

                            <div class="text-right">
                                <?php if (isset($_GET['question-id'])): ?>
                                    <p class="text-danger">* champs requis</p>
                                    <input class="btn btn-success" type="submit" name="update" value="Mettre a jour" />
                                <?php else: ?>
                                    <p class="text-danger">* champs requis</p>
                                    <input class="btn btn-success" type="submit" name="save" value="Enregistrer" />
                                <?php endif; ?>
                            </div>
                        </form>
                </div>
            </div>
        </section>
    </div>
</div>
<?php $content = ob_get_clean(); ?>
<?php require 'layout.php'; ?>
