<!--
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Document</title>

	<link rel="stylesheet" href="/css/uikit.min.css">
	<link rel="stylesheet" href="/css/main.css">
	<script src="/js/jquery-3.1.0.min.js"></script>
	<script src="/js/jquery.inputmask.bundle.js"></script>
	<script src="/js/uikit.min.js"></script>
	<script src="/js/scripts.js"></script>
</head>

<body>
<a href="#my-id" data-uk-modal>oop</a>
-->
	<div id="modalOrder" class="uk-modal">
		<div class="uk-modal-dialog modalOrder">
			<a class="uk-modal-close uk-close"></a>
<!--			<form>-->
		<?php form('modalOrder', ['id' => 'formModalOrder']); ?>
<!--			<label class="head" name="form[head]"></label>-->
			<input class="head" id="modalHeadOrder" type="text" name="form[order]" readonly>
			<input class="head" id="modalHeadPrise" type="text" name="form[price]" readonly>
				<ul class="des-materialListWith-icon uk-clearfix">
					<li>
						<div class="des-mod-order">
							<i class="uk-icon-user uk-icon-medium"></i>
							<label for="" class="label">Имя</label>
							<input type="text" class="input" name="form[name]">
						</div>
					</li>
					<li>
						<div class="des-mod-order">
							<i class="uk-icon-phone uk-icon-medium"></i>
							<label for="" class="label">Телефон</label>
							<input type="text" class="input" name="form[phone]" data-phone-mask>
						</div>
					</li>
					<li>
						<div class="des-mod-order is-focus">
							<i class="uk-icon-shopping-bag uk-icon-medium"></i>
							<label for="" class="label">Объем(не обязательно)</label>
							<input type="text" class="input" name="form[capacity]">
						</div>
					</li>
					<li>
						<div class="des-mod-order">
							<i class="uk-icon-map-marker uk-icon-medium"></i>
							<label for="" class="label">Адрес объекта(не обязательно)</label>
							<input type="text" class="input" name="form[location]">
						</div>
					</li>
					<li>
						<div class="des-mod-order">
							<i class="uk-icon-tags uk-icon-medium"></i>
							<label for="" class="label">Коментарий(не обязательно)</label>
							<textarea class="input" name="form[comment]"></textarea>
						</div>
					</li>
					<li>
							<button type="submit">отправить</button>
					</li>
				</ul>
				</form>
			</div>
	</div>
<!--
</body>

</html>-->
