<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Стоимость");
?>
<div class="page-price">
    <table class="table table-striped">
        <caption>Общий прайс-лист</caption>
        <tbody>
            <tr>
                <th scope="row">4 тренировки / 30 дней</th>
                <td>2800 руб.</td>
            </tr>
            <tr>
                <th scope="row">8 тренировок / 30 дней</th>
                <td>4500 руб.</td>
            </tr>
            <tr>
                <th scope="row">12 тренировок / 30 дней</th>
                <td>5500 руб.</td>
            </tr>
            <tr>
                <th scope="row">36 тренировок / 90 дней (10 дней заморозка)</th>
                <td>14500 руб.</td>
            </tr>
            <tr>
                <th scope="row">144 тренировки / 365 дней (45 дней заморозка)</th>
                <td>45000 руб.</td>
            </tr>
        </tbody>
    </table>

    <table class="table table-striped">
        <caption>Бразильское джиу-джитсу</caption>
        <tbody>
            <tr>
                <th scope="row">1 тренировка</th>
                <td>1000 руб.</td>
            </tr>
            <tr>
                <th scope="row">12 тренировок (дети)</th>
                <td>6500 руб.</td>
            </tr>
            <tr>
                <th scope="row">12 тренировок (взрослые)</th>
                <td>6000 руб.</td>
            </tr>
        </tbody>
    </table>

    <table class="table table-striped">
        <caption>Капоэйра</caption>
        <tbody>
            <tr>
                <th scope="row">8 тренировок / 30 дней (дети 3-6, 7-11 лет)</th>
                <td>4800 руб.</td>
            </tr>
            <tr>
                <th scope="row">8 тренировок / 30 дней (дети 12-18 лет)</th>
                <td>6800 руб.</td>
            </tr>
            <tr>
                <th scope="row">8 тренировок / 30 дней (взрослые)</th>
                <td>4800 руб.</td>
            </tr>
        </tbody>
    </table>
</div>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>