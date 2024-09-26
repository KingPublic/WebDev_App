<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gabungan Sortir Array</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
        }
        form {
            border: 1px solid #ccc;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            background: #f9f9f9;
        }
        label, input {
            display: block;
            margin-bottom: 10px;
        }
        input[type="text"], input[type="number"] {
            width: calc(100% - 22px);
            padding: 10px;
        }
        input[type="submit"] {
            padding: 10px 20px;
            background-color: #007BFF;
            color: white;
            border: none;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
        .containerarray {
            padding: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            background-color: #f9f9f9;
            width: 15%;
            margin: 15px;
        }
    </style>
</head>
<body>
    <form method="post">
        <label for="nums1">Masukkan Array Nums1 (pisahkan dengan koma):</label>
        <input type="text" name="nums1" id="nums1" required>
        <label for="m">Jumlah elemen aktif di Nums1:</label>
        <input type="number" name="m" id="m" required>
        <label for="nums2">Masukkan Array Nums2 (pisahkan dengan koma):</label>
        <input type="text" name="nums2" id="nums2" required>
        <label for="n">Jumlah elemen di Nums2:</label>
        <input type="number" name="n" id="n" required>
        <input type="submit" value="Gabungkan">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nums1 = array_map('intval', explode(',', $_POST['nums1']));
        $m = intval($_POST['m']);
        $nums2 = array_map('intval', explode(',', $_POST['nums2']));
        $n = intval($_POST['n']);

        // Memastikan nums1 cukup besar untuk menampung nums2
        $nums1 = array_slice($nums1, 0, $m); // Memotong array untuk menghilangkan nol tambahan
        $nums1 = array_merge($nums1, array_fill(0, $n, 0)); // Menambahkan nol untuk ruang nums2

        merge($nums1, $m, $nums2, $n);

        echo "<div class='containerarray'>Array gabungan: <br><pre>";
        print_r($nums1);
        echo "</pre></div>";
    }

    function merge(&$nums1, $m, $nums2, $n) {
        $index1 = $m - 1;
        $index2 = $n - 1;
        $mergeIndex = $m + $n - 1;

        while ($index2 >= 0) {
            if ($index1 >= 0 && $nums1[$index1] > $nums2[$index2]) {
                $nums1[$mergeIndex] = $nums1[$index1];
                $index1--;
            } else {
                $nums1[$mergeIndex] = $nums2[$index2];
                $index2--;
            }
            $mergeIndex--;
        }
    }
    ?>
</body>
</html>