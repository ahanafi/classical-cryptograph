<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Vigeneere Cipher</h1>
    <!-- DataTales Example -->
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Input Data</h6>
                </div>
                <div class="card-body mb-4">
                    <?php
                        $rangeChar = range('A', 'Z');
                        $lengtRange = count($rangeChar);
                        $vigeneereArr = [$rangeChar];
                        
                        for ($i = 1; $i < $lengtRange; $i++) {
                            $copy = $vigeneereArr[$i - 1];
                            array_push($copy, array_shift($copy));
                            $vigeneereArr[$i] = $copy;
                        }
                    ?>
                    <form action="<?php global $action; echo route_method($action) ?>" method="POST">
                        <div class="row">
                            <div class="col-md-6 offset-3">
                                <div class="row mt-3">
                                    <div class="col-sm-12">
                                        <label for="" class="form-control-label">Plain Text</label>
                                        <input type="text" style="text-transform: uppercase;" name="plaintext" class="form-control" required placeholder="Masukkan plaintext disini...">
                                    </div>
                                    <div class="col-sm-12 mt-3">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="" class="form-control-label">Key Text</label>
                                                <input type="text" style="text-transform: uppercase;" name="keyword" class="form-control" required placeholder="Masukkan kata kunci disini...">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="" class="form-control-label">Type</label>
                                                <select name="type" id="" class="form-control">
                                                    <option value="encrypt">ENCRYPT</option>
                                                    <option value="decrypt">DECRYPT</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="" class="form-control-label">&nbsp;</label>
                                        <button name="submit" class="btn btn-primary btn-block" type="submit">Submit</button>
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="" class="form-control-label">&nbsp;</label>
                                        <button class="btn btn-secondary btn-block" type="reset">Reset</button>
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="" class="form-control-label">&nbsp;</label>
                                        <button class="btn btn-success btn-block" id="show-vg-table" type="button">Show Table</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <?php
                if (isset($_POST['submit'])):
                    $plaintext = preg_replace('/\s/', '', trim(str_replace(" ", "", strtoupper(getPost('plaintext')))));
                    $keyword = preg_replace('/\s/', '', trim(str_replace(" ", "", strtoupper(getPost('keyword')))));
                    $type = getPost('type');
                    
                    $lengthText = strlen($plaintext);
                    $lengthKey = strlen($keyword);

                    $arrPlainKey = [];
                    $arrIndexResult = [];
                ?>
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Hasil</h6>
                    </div>
                    <div class="card-body mb-4">
                        <div class="row">
                            <div class="col-md-10 offset-1">
                                <div class="row mt-3">
                                    <table class="table table-bordered">
                                        <tr>
                                            <td class="text-center font-weight-bold bg-primary text-white">Plain Text</td>
                                            <?php for ($i = 0; $i < $lengthText; $i++): ?>
                                                <td class="text-center font-weight-bold"><?= $plaintext[$i] ?></td>
                                            <?php endfor ?>
                                        </tr>
                                        <tr>
                                            <td class="text-center font-weight-bold bg-primary text-white">Key</td>
                                            <?php
                                                $index = 0;
                                                for ($i = 0; $i < $lengthText; $i++):
                                                    if($index < $lengthText):
                                                        if ($i >= $lengthKey && $index < $lengthText):
                                                            $i = $lengthKey - $i;
                                                        endif;
                                            ?>
                                                    <td class="text-center font-weight-bold">
                                                        
                                                        <?php
                                                            $keyword[$i];
                                                            $arrPlainKey[] = [
                                                                $plaintext[$index], $keyword[$i]
                                                            ];

                                                            $indexPlain = getIndexOfChar($plaintext[$index]);
                                                            $indexKey   = getIndexOfChar($keyword[$i]);

                                                            $arrIndexResult[] = ($type == "encrypt") ? ($indexPlain + $indexKey) : ($indexPlain - $indexKey);
                                                            echo $keyword[$i];                                                        ?>
                                                    </td>
                                            <?php   endif;
                                                    $index++;
                                                endfor ?>
                                        </tr>
                                        <tr>
                                            <td class="text-center font-weight-bold bg-primary text-white">Plain Text</td>
                                            <?php for ($i = 0; $i < $lengthText; $i++): ?>
                                                <td class="text-center font-weight-bold">
                                                    
                                                    <?= getCharFromIndex($arrIndexResult[$i]) ?>
                                                </td>
                                            <?php endfor ?>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif ?>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

<!-- Logout Modal-->
<div class="modal fade" id="vigeneere-table" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Vigeneere Table</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                 <table class="table table-bordered table-hover">
                    <?php foreach ($vigeneereArr as $vigeneereRow): ?>
                        <tr>
                            <?php foreach ($vigeneereRow as $char): ?>
                                <td><?= $char; ?></td>
                             <?php endforeach; ?>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
