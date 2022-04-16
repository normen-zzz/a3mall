<!DOCTYPE html>
<html lang="en">

<body>
	<div class="container">

		<hr />
		<div class="isi">
			<p style="display: flex; justify-content: center; text-align: center">
				Halo, <?= $identity; ?>
			</p>
			<p style="display: flex; justify-content: center; text-align: center">
				Email ini anda terima atas permintaan untuk mengatur ulang kata sandi akun Anda
				pada AtigaMall
			</p>
		</div>
		<div class="button" style="display: flex; justify-content: center; text-align: center">
			<a href="<?= base_url('user/Auth/reset_password/' . $forgotten_password_code) ?>" style="
						background-color: #007bff;
						color: #fff;
						text-decoration: none;
						padding: 14px;
						border-radius: 6px;
					">Atur Password</a>
		</div>
		<p style="display: flex; justify-content: center; text-align: center">
			Jika anda tidak meminta mengatur ulang kata sandi, Silahkan abaikan saja email ini
			:)
		</p>
		<hr />
		<p style="display: flex; justify-content: center; text-align: center">
			Salam Hangat, A3Mall
		</p>
	</div>
</body>

</html>