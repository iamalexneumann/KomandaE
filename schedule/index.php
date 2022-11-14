<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Расписание");
?>
<iframe id="f781527"
    src="https://infokomandaeru.impulsecrm.ru/widget/1"
    style="width:100%; min-height:400px; border:0; transform:translateZ(0)"></iframe>
<script>
  const f781527 = document.getElementById("f781527");
  const iws1PostScroll = function(e) {
    const offset = Math.max(1, -f781527.getBoundingClientRect().top);
    f781527.contentWindow.postMessage({ iws1ScrollY: offset }, "*");
  };
  const iw1PostStorage = function(name) {
    const value = localStorage.getItem(name)
    if (value !== null) {
      f781527.contentWindow.postMessage({ iw1Storage: { name, value } }, "*");
    }
  };
  window.addEventListener("message", function(e) {
    const loaded = e.data.iw1Loaded;
    if (loaded) {
      iw1PostStorage("impulsecrm_active");
      iw1PostStorage("impulsecrm_verified");
    }
    const height = e.data.iws1Height;
    if (height) {
      f781527.height = height;
      iws1PostScroll();
    }
    const storage = e.data.iw1Storage;
    if (storage) {
      localStorage.setItem(storage.name, storage.value);
    }
  });
  window.addEventListener("scroll", iws1PostScroll);
</script>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>