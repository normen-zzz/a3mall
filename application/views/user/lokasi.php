<select name="provinsi" id="provinsi">provinsi</select>
<select name="kabupaten" id="kabupaten">kabupaten/kota</select>
<select name="kecamatan" id="kecamatan">kecamatan</select>
<select name="kelurahan" id="kelurahan">kelurahan</select>

<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script src="http://api.iksgroup.co.id/apijs/lokasiapi.js"></script>
<script>
    var render = createwidgetlokasi("provinsi", "kabupaten", "kecamatan", "kelurahan");
</script>