function whatsappContact({
  brandName: d_brandName = "",
  iconURL: d_IconUrl = "",
  buttonName: d_buttonName = "Chat with us",
  brandStatusText: d_StatusText = "",
  welcomeMessage: d_welcomeMsg = "",
  phoneNumber: d_phoneNumber = "",
  brandImageUrl: d_ImageUrl = "",
  callToAction: d_ctaText = "Start Chat",
  buttonSize: d_buttonSize = "large",
  prefillMessages: d_prefillMessages = "",
  replyOptions: d_replyOptions = "",
  buttonPosition: d_buttonPosition = "bottom-right",
}) {
  document.addEventListener("DOMContentLoaded", function () {
    const optionsArray = d_replyOptions
      .split(",")
      .map((option) => option.trim());

    // Set default message with the first reply option if available
    const defaultReply = optionsArray.length > 0 ? optionsArray[0] : "";
    const d_prefillMessagesDefault = d_prefillMessages + defaultReply;
    const decodedImageUrl = decodeURIComponent(d_ImageUrl);
    const sizeMap = { large: "large", medium: "medium", small: "small" };
    const buttonSizeClass = sizeMap[d_buttonSize] || sizeMap.large;

    const widgetTemplate = `
    <style>
    .epos-whatsapp-wa {
  bottom: 75px;
  height: 45px;
  padding: 0 !important;
  position: fixed;
  right: 25px;
  width: 45px;
  z-index: 20;
}
.epos-whatsapp-wa,
.epos-whatsapp-wa.wapp-chatCta {
  background: none !important;
  border: none !important;
}
@media (max-width: 768px) {
  .epos-whatsapp-wa.wapp-chatCta {
    width: 45px !important;
  }
}
.epos-whatsapp-wa img {
  height: 100%;
  width: 100%;
}
@media (min-width: 768px) {
  .epos-whatsapp-wa {
    bottom: 100px;
    height: 65px;
    width: 65px;
  }
}
.wapp-widgetGrp {
  bottom: 100px;
  position: fixed;
  right: 0;
  width: 100%;
  z-index: 19;
}
@media (min-width: 768px) {
  .wapp-widgetGrp {
    bottom: 70px;
    right: 100px;
    width: auto;
  }
}
.wapp-chatCta {
  align-items: center;
  background-color: #26d466 !important;
  border: 1px solid #26d466 !important;
  border-radius: 30px;
  color: #fff;
  cursor: pointer;
  display: flex;
  font: 18px/1 var(--primaryfont-semibold);
  justify-content: center;
  transition: all 0.3s ease-out;
  width: 100%;
}
.wapp-preview {
  background: #fff;
  border-radius: 10px;
  box-shadow: 0 0 62.32px 13.68px rgba(87, 87, 87, 0.11);
  max-width: 350px;
}
.wapp-topStripe {
  align-items: flex-start;
  background: #056055;
  border-radius: 10px 10px 0 0;
  color: #fff;
  display: flex;
  justify-content: space-between;
  padding: 12px;
}
.wapp-profileSec {
  align-items: center;
  display: flex;
  width: calc(100% - 25px);
}
.wapp-profileLft {
  background-color: #fff;
  border-radius: 50%;
  height: 52px;
  margin-right: 15px;
  overflow: hidden;
  position: relative;
  width: 52px;
}
.wapp-profileLft img,
.wapp-txtImg {
  content: "";
  display: inline-block;
  height: auto;
  left: 50%;
  position: absolute;
  top: 50%;
  transform: translate(-50%, -50%);
  width: 85%;
}
.wapp-txtImg {
  color: #000;
  width: auto;
}
.wapp-profileRht {
  display: flex;
  flex-direction: column;
  width: calc(100% - 67px);
}
.wapp-name {
  font: 20px/1.1 var(--primaryfont-semibold);
  margin-bottom: 5px;
}
.wapp-status {
  font: 15px/1.1 var(--primaryfont-regular);
  overflow: hidden;
  text-overflow: ellipsis;
  white-space: nowrap;
  width: 270px;
}
.wapp-widgetClose {
  cursor: pointer;
  display: inline-block;
  font-size: 22px;
  height: 25px;
  width: 25px;
}
.wapp-widgetClose i {
  pointer-events: none;
}
.wapp-msgSection {
  background: #e8ded4
    url(https://oweb.zohowebstatic.com/sites/oweb/images/zohobigin/images/wapp-background.jpg);
  background-size: cover;
  max-height: 250px;
  overflow: auto;
  padding: 20px 20px 15px;
}
.wapp-msgLft {
  background-color: #fff;
  border-radius: 10px;
  display: flex;
  flex-direction: column;
  justify-content: flex-start;
  margin-bottom: 25px;
  padding: 20px;
  width: 75%;
}
.wapp-msgRht {
  display: flex;
  justify-content: flex-end;
  width: 100%;
}
.wapp-msgRhtInner {
  align-items: flex-start;
  background-color: #fff;
  border-radius: 10px;
  padding: 20px;
  width: 75%;
}
.wapp-tagGroups {
  align-items: flex-start;
  display: flex;
  flex-wrap: wrap;
  margin-top: 15px;
}
.wapp-smarttag-btn {
  background: #fff !important;
  border: 1px solid #26d466;
  border-radius: 23px !important;
  color: #000 !important;
  cursor: pointer;
  display: inline-block;
  font-size:12px;
  margin: 0 10px 10px 0;
  outline: 0;
  padding: 4px 12px !important;
  transition: all 0.2s ease-out;
}
.wapp-smarttag-btn.active,
.wapp-smarttag-btn:hover {
  background: #dcf7c5 !important;
  border: 1px solid #26d466;
}
.wapp-msgdefault {
  display: block;
  font: 16px/1 var(--primaryfont-semibold);
  padding-bottom: 10px;
}
.wapp-dynamicMsg,
.wapp-msgCont {
  display: block;
  word-wrap: break-word;
  font: 16px/1.4 var(--primaryfont-regular);
}
.wapp-btnSection {
  background: #fff;
  border-radius: 0 0 10px 10px;
  padding: 12px;
}
.wapp-btnSection .wapp-chatCta {
  padding: 12px 25px;
}
.wapp-chatCta.medium {
  padding: 12px 30px;
}
.wapp-chatCta.small {
  padding: 9px 30px;
}
.wapp-icon {
  background: url(https://oweb.zohowebstatic.com/sites/oweb/images/zohobigin/images/whatsapp-free-widget-tool-svg-sprite.svg)
    no-repeat -41px -9px;
  display: inline-block;
  height: 25px;
  margin-right: 10px;
  width: 25px;
}
.wapp-signature {
  align-items: center;
  color: #000;
  display: flex;
  font: 15px/1.1 var(--primaryfont-semibold);
  padding-top: 10px;
}
.wapp-btnSection .wapp-signature {
  justify-content: center;
}
.wapp-signature a {
  color: #0090eb;
}
.wapp-poweredIcon {
  background: url(https://oweb.zohowebstatic.com/sites/oweb/images/zohobigin/images/whatsapp-free-widget-tool-svg-sprite.svg)
    no-repeat -114px -12px;
  display: inline-block;
  height: 18px;
  margin-right: 5px;
  width: 13px;
}
.wapp-float-btn {
  padding: 40px 0 10px;
  transition: all 0.3s ease;
}
.wapp-float-btn .wapp-chatCta {
  width: auto;
}
.bottom-left,
.bottom-right {
  align-items: flex-end;
  display: flex;
  flex-direction: column;
  transition: all 0.3s ease;
}
.bottom-left {
  align-items: flex-start;
}
@media only screen and (max-width: 450px) {
  .wapp-txtImg {
    font-size: 22px;
  }
  .wapp-name {
    font-size: 18px;
  }
  .wapp-dynamicMsg,
  .wapp-msgCont {
    font-size: 15px;
  }
  .wapp-preview {
    margin: 0 auto;
    max-width: 100%;
    width: 96%;
  }
  .wapp-float-btn {
    padding: 20px 0 10px;
  }
}

    </style>
      <div class="wapp-widgetGrp">
        <div class="wapp-preview" style="display:none">
          <div class="wapp-topStripe">
            <div class="wapp-profileSec">
              <span class="wapp-profileLft"><img src="${decodedImageUrl}" alt="${d_brandName} Logo"/></span>
              <span class="wapp-profileRht">
                <span class="wapp-name">${d_brandName}</span>
                <span class="wapp-status">${d_StatusText}</span>
              </span>
            </div>
            <span class="wapp-widgetClose">
             <svg width="18" height="17" viewBox="0 0 18 17" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M16.0143 1L1.01428 16" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
<path d="M1.01428 1L16.0143 16" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
</svg>


             </span>
          </div>
          <div class="wapp-msgSection">
            <div class="wapp-msgLft">
              <span class="wapp-msgdefault">${d_brandName}</span>
              <span class="wapp-msgCont">${d_welcomeMsg}</span>
            </div>
            <div class="wapp-msgRht">
              <div class="wapp-msgRhtInner">
                <span class="wapp-dynamicMsg">${d_prefillMessagesDefault} <span class="dynamicMsg"></span></span>
                <div class="wapp-tagGroups">
                  ${optionsArray
                    .map(
                      (option, key) => `
                    <span class="wapp-smarttags">
                      <button class="wapp-smarttag-btn ${
                        key == 0 ? "active" : ""
                      }" data-tags="${option}" value="${option}">${option}</button>
                    </span>`
                    )
                    .join("")}
                </div>
              </div>
            </div>
          </div>
          <div class="wapp-btnSection">
            <a class="whatsapp-link" style="text-decoration:none;width:100%"
              href="https://api.whatsapp.com/send?phone=${d_phoneNumber}&text=${encodeURIComponent(
      d_prefillMessagesDefault
    )}"
              rel="noopener noreferrer" target="_blank">
              <button class="wapp-chatCta"><span class="wapp-icon"></span><span class="wapp-ctaTxt">${d_ctaText}</span></button>
            </a>
          </div>
        </div>
        <div class="wapp-float-btn ${d_buttonPosition}">
          <button class="wapp-chatCta epos-whatsapp-wa">
            <img src="${d_IconUrl}" 
                 alt="EPOS WhatsApp Chat" width="50" height="50">
          </button>
        </div>
      </div>`;

    // Append the widget to the body
    document.body.insertAdjacentHTML("beforeend", widgetTemplate);

    const previewSec = document.querySelector(".wapp-preview");
    const floatBtn = document.querySelector(".wapp-float-btn button");
    const closeBtn = document.querySelector(".wapp-widgetClose");
    const tagGroupsDiv = document.querySelector(".wapp-tagGroups");
    const dynamicMsgElement = document.querySelector(".dynamicMsg");
    const whatsappLink = document.querySelector(".whatsapp-link");
    const defaultMsg = document.querySelector(".wapp-dynamicMsg");
    // Toggle chat preview
    floatBtn.addEventListener("click", () => {
      previewSec.style.display =
        previewSec.style.display === "none" ? "block" : "none";
    });

    closeBtn.addEventListener("click", () => {
      previewSec.style.display = "none";
    });

    // Event delegation for dynamically generated buttons
    tagGroupsDiv.addEventListener("click", (e) => {
      if (e.target.classList.contains("wapp-smarttag-btn")) {
        document
          .querySelectorAll(".wapp-smarttag-btn")
          .forEach((tag) => tag.classList.remove("active"));
        e.target.classList.add("active");

        const selectedOption = e.target.value;
        dynamicMsgElement.innerText = `${d_prefillMessages} ${selectedOption}`;
        defaultMsg.innerText = dynamicMsgElement.innerText;

        const updatedPrefillMsg = `${d_prefillMessages} ${selectedOption}`;
        whatsappLink.href = `https://api.whatsapp.com/send?phone=${d_phoneNumber}&text=${encodeURIComponent(
          updatedPrefillMsg
        )}`;
      }
    });
  });
}
