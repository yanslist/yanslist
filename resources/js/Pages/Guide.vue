<template>
  <base-layout>

    <div class="uk-section">
      <div class="uk-container">
        <h3>{{ translate('main.guide') }}</h3>
        <div class="uk-card uk-grid-collapse uk-child-width-1-2@s uk-margin" uk-grid>
          <div class="uk-flex-last@s uk-card-media-right uk-cover-container">
            <img src="/img/guide-2.jpg" alt="" uk-cover>
            <canvas width="600" height="400"></canvas>
          </div>
          <div>
            <div class="uk-card-body">
              <h3 class="uk-card-title">ညာဖက်က ပုံမျိုးကို ကျွန်တော်တို့ ရင်းနှီးကြမှာပါ။</h3>
              <p>လူအများသွားလာတတ်ကြတဲ့နေရာတွေမှာ သင်တန်းတစ်ခုခုကဖြစ်စေ၊ ဆိုင်တစ်ဆိုင်တိုင်ကဖြစ်စေ၊
                ပစ္စည်းတစ်ခုခုရောင်းဖို့ဖြစ်စေ လူတွေသိပြီး ဆက်သွယ်လို့ရအောင် စာရွက်လေးတွေ ကပ်ကြ ဝေကြပါတယ်။
                ကြော်ငြာကပ်တာပေါ့။</p>
            </div>
          </div>
        </div>
        <div class="uk-card uk-grid-collapse uk-child-width-1-2@s uk-margin" uk-grid>
          <div class="uk-card-media-left uk-cover-container">
            <img src="/img/guide-1.jpg" alt="" uk-cover>
            <canvas width="600" height="400"></canvas>
          </div>
          <div>
            <div class="uk-card-body">
              <h3 class="uk-card-title">ကိုယ့်မှာလိုအပ်နေတာမျိုးလည်း ဖြစ်နိုင်တယ်။</h3>
              <p>လူပျောက် ခွေးပျောက်ကစလို့ အိမ်ခန်းရှာ အဆောင်ရှာအထိပေါ့။ ရှာတွေ့ထားတဲ့လူ ကူညီနိုင်မယ့်လူဆိုရင်
                ဆက်သွယ်ဖို့ဆိုပြီး ဖုန်းနံပါတ်လေးတွေလည်း ထည့်ပေးတတ်ကြတာပေါ့။ ဒီ့အပြင်နီးစပ်ရာ ဆွေမျိုးမိတ်ဆွေတွေကိုလည်း
                ပေးတာ၊ တစ်ဆင့်ကမ်းခိုင်းတာမျိုးတွေရှိကြပါတယ်။</p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="uk-section uk-section-primary uk-light">
      <div class="uk-container uk-text-center">
        <h2>
          ဒီ Yan's List website က အဲ့လို ကြော်ငြာလေးတွေ ကို online မှာလာတင်ထားကြလို့ရမယ့် နေရာတစ်ခုပါ။
        </h2>
      </div>
    </div>

    <div class="uk-section">
      <div class="uk-container">
        <div class="uk-grid-collapse" uk-grid>
          <div class="uk-width-2-5@m uk-width-1-1@s">
            <dl class="uk-description-list">
              <dt>ဘယ်သူတွေသုံးလို့ရလဲ</dt>
              <dd>မည်သူမဆိုသုံးနိုင်ပါတယ်။</dd>
              <dt>ကုန်ကျစရိတ်ရှိမလား</dt>
              <dd>မရှိပါ။ အခမဲ့အသုံးပြုနိုင်ပါတယ်။</dd>
              <dt>ဘယ်လိုတင်ရမလဲ</dt>
              <dd>Post New/အသစ်တင်မယ် ဆိုတဲ့ ခလုတ်ကိုနှိပ်ပြီး ပြထားတဲ့ ဥပမာပုံလိုမျိုး အကြောင်းအရာတွေဖြည့်ပေးပြီး
                တင်လို့ရပါတယ်။ မိမိကိုအလွယ်တကူ ဆက်သွယ်စေချင်ရင်တော့ မိမိကို ဆက်သွယ်လို့ရမယ့် ဖုန်းနံပါတ်၊
                email စတာတွေကိုပါ ပိုစ့်မှာ ထည့်ပြီးရေးပေးဖို့ လိုပါလိမ့်မယ်။
              </dd>
              <dt>ကိုယ့်ပိုစ့်ကို ကြည့်တဲ့လူတွေက ဘယ်လိုနည်းတွေနဲ့ဆက်သွယ်လို့ရလဲ</dt>
              <dd>
                <ul>
                  <li>ပိုစ့်ထဲမှာ ဆက်သွယ်ဖို့ အချက်အလက်ပါရင် သူတို့ဆက်သွယ်နိုင်သလို။</li>
                  <li>ဒီ website က ပိုစ့်ပြထားတဲ့ page ကနေ comment သို့ message ပို့ပြီးဆက်သွယ်နိုင်ပါတယ်။</li>
                  <li>Comment တွေကိုတော့ website မှာ ပြသထားမှာဖြစ်ပါတယ်။</li>
                  <li>Message တွေကိုတော့ ပိုစ့်တင်တုန်းကပေးထားတဲ့ email ကို ပို့ပေးမှာဖြစ်ပါတယ်။</li>
                </ul>
              </dd>
            </dl>
          </div>
          <div class="uk-width-3-5@m uk-width-1-1@s">
            <img src="/img/guide-3.png" alt="">
          </div>
        </div>
        <dl class="uk-description-list">
          <dt>Facebook တို့ဘာတို့တွေရှိနေတာ ဘာလို့ ဒီမှာတင်သင့်တာလဲ</dt>
          <dd>
            <ul>
              <li>ဒီမှာက ဘာ account မှ မဝင်ရ ဘာမှ မစစ်ဆေးထားတာမို့ မိမိကိုယ်ရေးကိုယ်တာလုံခြုံရေးကို
                စိတ်ချနိုင်ပါတယ်။
              </li>
              <li>ဒီမှာက မြို့နယ်အလိုက် ဒေသအလိုက် အလွယ်တကူ စုစည်းပြီး ကြည့်ရှုလို့ရနိုင်ပါတယ်။</li>
              <li>မိမိသတ်မှတ်တဲ့ ကာလကျော်လွန်တာနဲ့ အလိုအလျောက် ပိုစ့်က ပျောက်ပျက်သွားပါတယ်။</li>
            </ul>
          </dd>
          <dt>ကိုယ်ရေးကိုယ်တာလုံခြုံတယ်ဆိုပေမယ့် email ထည့်ပေးရတာပဲမလား</dt>
          <dd>ထည့်သွင်းလိုက်တဲ့ email ကို မည်သူတစ်ဦးတစ်ယောက်ကိုမှ မပြသပေးပါ။ Website database မှာ
            သိမ်းဆည်းရာမှာလည်း encrypted လုပ်ပြီးမှ သိမ်းဆည်းပါတယ်။
          </dd>
          <dt>ကိုယ့် email အစစ်မဟုတ်ပဲ ထည့်ချင်တာထည့်လို့ရလား</dt>
          <dd>ရပါတယ်။ ဘယ်သူမှမသုံးတဲ့ Email လိပ်စာအမှားထည့်သွင်းရင်တောင် ရပါတယ်။ ဒါပေမယ့် ကိုယ်တင်ထားတဲ့
            ပိုစ့်ကိုဖတ်ပြီး
            ကိုယ်နဲ့တိုက်ရိုက် ဆက်သွယ်ချင်တဲ့လူကစာပို့ရင်တော့ ကိုယ်ဖတ်လို့ရမှာ မဟုတ်ဘူးပေါ့။ တကယ်လို့ ကိုယ့် email
            အစစ် မပေးချင်ဘူးဆိုရင် ယာယီအသုံးပြုလို့ရတဲ့ email လိပ်စာတစ်ခုဖန်တီးပြီး ထည့်သွင်းဖို့ အကြံပြုပါတယ်။
          </dd>
          <dt>ကိုယ့်ပိုစ့်ကို လူတွေများများသိအောင် ဘယ်လိုလုပ်ရမလဲ</dt>
          <dd>ပိုစ့်ကြည့်လို့ရတဲ့ page မှာ social media တွေကို အလွယ်တကူ share ဖို့ လုပ်ပေးထားပါတယ်။ ဒါ့အပြင် post
            တစ်ခုစီအတွက် qrcode တစ်ခုစီလည်း ရရှိမှာဖြစ်ပါတယ်။ Qrcode ကို scan လိုက်ရင် ပိုစ့် page ကို တန်းရောက်ပါတယ်။
            ကိုယ့်ပိုစ့် link သို့ qrcode ကို share ခြင်းနှင့် လူများများသိအောင် လုပ်ဆောင်နိုင်ပါတယ်။
          </dd>
        </dl>
      </div>
    </div>

  </base-layout>
</template>

<script>
import BaseLayout from "../Layouts/BaseLayout";

export default {
  components: {
    BaseLayout,
  },
  data() {
    return {}
  },
  props: {},
  methods: {},
}
</script>
