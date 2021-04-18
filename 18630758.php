<?php
    //Fungsi Konversi
    function char_to_dec($a){
        $i=ord($a);
        if ($i>=97 && $i<=122){
            return ($i-96);
        } else if ($i>=65 && $i<=90){
            return ($i-38);
        } else {
            return null;
        }
    }

    function dec_to_char($a){
        if ($a>=1 && $a<=26){
            return (chr($a+96));
        } else if ($a>=27 && $a<=52){
            return (chr($a+38));
        } else {
            return null;
        }
    }
?>

<!doctype html>

<html lang="en">
 
<head>
    <meta charset="utf-8">
    <title>Algoritma Cipher Caesar</title>
    <meta name="description" content="Tugas MK KSK Algoritma">
    <meta name="Andhika PJ" content="Cipher Caesar">
    <script type="text/javascript">
        function SelectAll(id){
            document.getElementById(id).focus();
            document.getElementById(id).select();
        }
        function InfoCaesar(){
            alert("Key wajib format kombinasi angka, defaultnya bernilai 3"+'\n'+"dan Plaintext tidak boleh mengandung angka!");
        }
    </script>
    <style>
		fieldset{
			width: 250px; /* lebar */
			border-color: red green blue yellow; /* warna garis tepi */
			box-shadow: 2px 2px 4px #000; /* bayangan */
		}
    </style>
</head>
 
<body>
    <center>
    <h2>Implementasi Algoritma Caesar Cipher</h2>
    <h4>Mata Kuliah Keamanan Sistem Komputer</h4>
    </center>

    <table width="600" align="center">
        <tr><td width="50%" valign="top">
        
            <fieldset>
            <legend><b>Caesar</b></legend>
            Key:
            <form action="" method="post">
            <input type="text" name="key_caesar" id="key_caesar" value="3" onclick="SelectAll('key_caesar')" />
            <input type="submit" value="?" onclick="InfoCaesar()" /><br>
            
            <br>Plaintext:
            <textarea rows="19" name="plaintext_caesar" id="plaintext_caesar" cols="33" value="" onclick="SelectAll('plaintext_caesar')" ></textarea>
            <input type="submit" name="encrypt_caesar" value="Encrypt" />
            <input type="submit" name="decrypt_caesar" value="Decrypt" />
            </form>
            </fieldset>
            <br>
            <!-- <fieldset>
            <legend><b>Plaintext</b></legend>
            </fieldset> -->

            </td><td valign="top" colspan="3">

            <fieldset>
                <legend><b>Hasil 1x</b></legend>
                <?php
                //Ulang Sebanyak Digit Terakhir NPM = 18630758, 18 Kali Perulangan.
                //Fungsi Algoritma Caesar Cipher Default
                $npm = [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17];
                    if((isset($_POST['key_caesar'])) && (isset($_POST['plaintext_caesar'])) && isset($_POST['encrypt_caesar'])){
                        $key=$_POST['key_caesar'];
                        $plaintext=$_POST['plaintext_caesar'];
                        $split_key=str_split($key);
                        $i=0;
                        $split_chr=str_split($plaintext);
                        while ($key>52){
                            $key=$key-52;
                        }
                        foreach($split_chr as $chr){
                            if (char_to_dec($chr)!=null){
                                $split_nmbr[$i]=char_to_dec($chr);
                            } else {
                                $split_nmbr[$i]=$chr;
                            }
                            $i++;
                        }
                        echo '<textarea rows="20" id="result" cols="33" onclick="SelectAll(\'result\')" >';
                        foreach($npm as $ulang) {
                            foreach($split_nmbr as $nmbr){
                                if (($nmbr+$key)>52){
                                    if (dec_to_char($nmbr)!=null){
                                        echo dec_to_char(($nmbr+$key)-52);
                                    } else {
                                        echo $nmbr;
                                    }
                                } else {
                                    if (dec_to_char($nmbr)!=null){
                                        echo dec_to_char($nmbr+$key);
                                    } else {
                                        echo $nmbr;
                                    }
                                }
                            }
                            print_r("\n");
                        }

                        echo '</textarea><br/>';
                        //Text Asli
                        //echo $chr;

                    } else if ((isset($_POST['key_caesar'])) && (isset($_POST['plaintext_caesar'])) && isset($_POST['decrypt_caesar'])){
                        $key=$_POST['key_caesar'];
                        $plaintext=$_POST['plaintext_caesar'];
                        $i=0;
                        $split_chr=str_split($plaintext);
                        while ($key>52){
                            $key=$key-52;
                        }
                        foreach($split_chr as $chr){
                            if (char_to_dec($chr)!=null){
                                $split_nmbr[$i]=char_to_dec($chr);
                            } else {
                                $split_nmbr[$i]=$chr;
                            }
                            $i++;
                        }
                        echo '<textarea rows="20" id="result" cols="33" onclick="SelectAll(\'result\')" >';
                        foreach($npm as $ulang) {
                        foreach($split_nmbr as $nmbr){
                            if (($nmbr-$key)<1){
                                if (dec_to_char($nmbr)!=null){
                                    echo dec_to_char(($nmbr-$key)+52);
                                } else {
                                    echo $nmbr;
                                }
                            } else {
                                if (dec_to_char($nmbr)!=null){
                                    echo dec_to_char($nmbr-$key);
                                } else {
                                    echo $nmbr;
                                }
                            }
                            }
                                print_r("\n");
                        }
                        echo '</textarea><br/>';

                    } else {
                        echo "Silahkan Enc/Dec untuk melihat hasil";
                    }
                ?>
            </fieldset>

            </td><td valign="top" colspan="6">

            <fieldset>            
            <legend><b>Hasil perhitungan sebanyak 18x</b></legend>
            <?php
                //Ulang Sebanyak Digit Terakhir NPM = 18630758, 18 Kali Perulangan. 3*18 = 54. 54-26 = 28, 28-26= 2. Jika nilai lebih dari 26. Maka dikecilkan sehingga <26.
                //Enkripsi A Geser 3x = D, Untuk 18x Enkripsi didapat Nilai 2 atau C. Nilai Statis Hitung Secara Manual
                    if((isset($key)) && (isset($_POST['plaintext_caesar'])) && isset($_POST['encrypt_caesar'])){
                        $key=2;
                        $plaintext=$_POST['plaintext_caesar'];
                        $split_key=str_split($key);
                        $i=0;
                        $split_chr=str_split($plaintext);
                        while ($key>52){
                            $key=$key-52;
                        }
                        foreach($split_chr as $chr){
                            if (char_to_dec($chr)!=null){
                                $split_nmbr[$i]=char_to_dec($chr);
                            } else {
                                $split_nmbr[$i]=$chr;
                            }
                            $i++;
                        }
                        echo '<textarea rows="20" id="result" cols="33" onclick="SelectAll(\'result\')" >';
                        
                            foreach($split_nmbr as $nmbr){
                                if (($nmbr+$key)>52){
                                    if (dec_to_char($nmbr)!=null){
                                        echo dec_to_char(($nmbr+$key)-52);
                                    } else {
                                        echo $nmbr;
                                    }
                                } else {
                                    if (dec_to_char($nmbr)!=null){
                                        echo dec_to_char($nmbr+$key);
                                    } else {
                                        echo $nmbr;
                                    }
                                }
                            }

                        echo '</textarea><br/>';
                        //Text Asli
                        //echo $chr;

                    } else if ((isset($key)) && (isset($_POST['plaintext_caesar'])) && isset($_POST['decrypt_caesar'])){
                        $key=2;
                        $plaintext=$_POST['plaintext_caesar'];
                        $i=0;
                        $split_chr=str_split($plaintext);
                        while ($key>52){
                            $key=$key-52;
                        }
                        foreach($split_chr as $chr){
                            if (char_to_dec($chr)!=null){
                                $split_nmbr[$i]=char_to_dec($chr);
                            } else {
                                $split_nmbr[$i]=$chr;
                            }
                            $i++;
                        }
                        echo '<textarea rows="20" id="result" cols="33" onclick="SelectAll(\'result\')" >';
                        
                        foreach($split_nmbr as $nmbr){
                            if (($nmbr-$key)<1){
                                if (dec_to_char($nmbr)!=null){
                                    echo dec_to_char(($nmbr-$key)+52);
                                } else {
                                    echo $nmbr;
                                }
                            } else {
                                if (dec_to_char($nmbr)!=null){
                                    echo dec_to_char($nmbr-$key);
                                } else {
                                    echo $nmbr;
                                }
                            }
                            }
                        echo '</textarea><br/>';

                    } else {
                        echo "Silahkan Enc/Dec untuk melihat hasil";
                    }
                ?>
            </fieldset>
            </td></tr>
        </table>
</body>
<footer>
  <p align="center">Nama: Andhika Prima Jaya | NPM: 18630758</p>
</footer>
</html>