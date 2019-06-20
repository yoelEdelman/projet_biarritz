<?php $title = 'Administration des reponses -  !'; ?>
<?php ob_start(); ?>
    <div class="container-fluid">
        <?php require '././partials/backend/header.php'; ?>
        <div class="row my-3 index-content">
            <?php require '././partials/backend/nav.php'; ?>
            <section class="col-9">

                <header class="pb-3">
                    <h4><?= (isset($_GET['response-id'])) ? 'Modifier une reponse' : 'Ajouter une reponse' ;?></h4>
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
                        <?php if (isset($_GET['response-id'])): ?>
                        <form action="index.php?page=admin-responses-form&response-id=<?= $response['id'];?>&action=edit" method="post" enctype="multipart/form-data">
                            <?php else: ?>
                            <form action="index.php?page=admin-responses-form" method="post" enctype="multipart/form-data">
                                <?php endif; ?>

                                <div class="form-group">
                                    <label for="questions"> Questions <b class="text-danger">*</b></label>
                                    <select multiple class="form-control" name="question" id="questions" multiple="multiple">
                                        <?php foreach($questions as $key => $question): ?>
                                            <option value="<?= $question['id'];?>"
                                                <?php if (isset($_GET['question-id']) && $question['id'] == $response['question_id']): ?>
                                                    selected="selected"
                                                <?php endif;?>
                                            ><?= $question['question']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="response">Reponse : <b class="text-danger">*</b></label>
                                    <input class="form-control"  type="text" placeholder="Reponse" name="response" id="response" value="<?= isset($response) ? htmlentities($response['answer']) : '';?>" />
                                </div>

                                <?php if (isset($_GET['response-id'])): ?>
                                    <input class="form-control" type="hidden" name="response-id" id="response-id" value="<?= $response['id']; ?>"/>
                                <?php endif;?>

                                <div class="text-right">
                                    <?php if (isset($_GET['response-id'])): ?>
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