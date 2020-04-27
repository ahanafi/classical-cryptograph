<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Caesar Cipher Satu Kunci</h1>
    <!-- DataTales Example -->
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Input Data</h6>
                </div>
                <div class="card-body mb-4">
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
                                    <div class="col-sm-6">
                                        <label for="" class="form-control-label">&nbsp;</label>
                                        <button name="submit" class="btn btn-primary btn-block" type="submit">Submit</button>
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="" class="form-control-label">&nbsp;</label>
                                        <button class="btn btn-secondary btn-block" type="reset">Reset</button>
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

                    $rangeChar = range('A', 'Z');
                    $lengthChar = count($rangeChar);

                    //Convert string to array
                    $keyword = str_split($keyword);
                    $unique = array_unique($keyword);
                    $newRange = array_unique(array_merge($unique, $rangeChar));

                    $index = 0;
                    $resultRange = [];
                    foreach ($newRange as $val) {
                        $resultRange[$index] = $val;
                        $index++;    
                    }

                    $plainTextResult = "";
                    $cipherTextResult = "";

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
                                            <td class="text-center font-weight-bold bg-primary text-white">REAL</td>
                                            <?php for ($i = 0; $i < $lengthChar; $i++): ?>
                                                <td class="text-center font-weight-bold"><?= $rangeChar[$i] ?></td>
                                            <?php endfor ?>
                                        </tr>
                                        <tr>
                                            <td class="text-center font-weight-bold bg-primary text-white">NEW</td>
                                            <?php for ($i = 0; $i < $lengthChar; $i++): ?>
                                                <td class="text-center font-weight-bold"><?= $resultRange[$i] ?></td>
                                            <?php endfor ?>
                                        </tr>
                                    </table>
                                    <hr>
                                    <table class="table table-bordered">
                                        <tr>
                                            <td class="text-center font-weight-bold bg-success text-white">Plain Text</td>
                                            <?php for ($i = 0; $i < $lengthText; $i++): ?>
                                                <td class="text-center font-weight-bold">
                                                    <?php
                                                        $plainTextResult .= $plaintext[$i];
                                                        echo $plaintext[$i];
                                                    ?>
                                                </td>
                                            <?php endfor ?>
                                        </tr>
                                        <tr>
                                            <td class="text-center font-weight-bold bg-success text-white">Cipher Text</td>
                                            <?php
                                                for ($i = 0; $i < $lengthText; $i++):
                                                    for ($x = 0; $x < $lengthChar; $x++):
                                                        if ($type == "encrypt"):
                                                            if($plaintext[$i] == $rangeChar[$x]):
                                            ?>
                                                                <td class="text-center font-weight-bold">
                                                                    <?php
                                                                        $cipherTextResult .= $resultRange[$x];
                                                                        echo $resultRange[$x];
                                                                    ?>
                                                                </td>
                                            <?php           endif;
                                                        elseif($type == "decrypt"):
                                                            if ($plaintext[$i] == $resultRange[$x]):
                                            ?>
                                                                <td class="text-center font-weight-bold">
                                                                    <?php
                                                                    $cipherTextResult .= $rangeChar[$x];
                                                                    echo $rangeChar[$x];
                                                                    ?>
                                                                </td>
                                            <?php
                                                            endif;
                                                        endif;
                                                    endfor;
                                                endfor
                                            ?>
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
