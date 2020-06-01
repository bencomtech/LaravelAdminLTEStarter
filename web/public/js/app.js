const enDateTimeFormat = {
  dateTime: "YYYY-MM-DD HH:mm:ss",
  date: "YYYY-MM-DD",
};
const thDateTimeFormat = {
  dateTime: "DD/MM/YYYY HH:mm:ss",
  date: "DD/MM/YYYY",
};

$.Loading.setDefaults({
  message: "กำลังโหลด...",
});

$(function () {
  moment.locale("th");
  if (typeof $.fn.bootstrapTable !== "undefined") {
    $.extend($.fn.bootstrapTable.defaults, {
      locale: "th-TH",
      pagination: true,
      pageSize: 50,
      showFullscreen: true,
      showColumns: true,
      exportDataType: "all",
      exportTypes: ["excel", "csv", "txt"],
      onPostFooter: function () {
        $(".number").css("text-align", "right").number(true, 2);
      },
    });
    $.extend($.fn.bootstrapTable.columnDefaults, {
      halign: "center",
      valign: "middle",
      widthUnit: "%",
    });
  }
  if (typeof $.fn.datepicker !== "undefined") {
    $.extend($.fn.datepicker.defaults, {
      format: "dd/mm/yyyy",
      todayBtn: "linked",
      clearBtn: true,
      language: "th-th",
      todayHighlight: true,
      autoclose: true,
    });
  }
  $(".number").css("text-align", "right").number(true, 2);
});

const popupCenter = ({ url, title, w, h }) => {
  const dualScreenLeft =
    window.screenLeft !== undefined ? window.screenLeft : window.screenX;
  const dualScreenTop =
    window.screenTop !== undefined ? window.screenTop : window.screenY;

  const width = window.innerWidth
    ? window.innerWidth
    : document.documentElement.clientWidth
    ? document.documentElement.clientWidth
    : screen.width;
  const height = window.innerHeight
    ? window.innerHeight
    : document.documentElement.clientHeight
    ? document.documentElement.clientHeight
    : screen.height;

  const systemZoom = width / window.screen.availWidth;
  const left = (width - w) / 2 / systemZoom + dualScreenLeft;
  const top = (height - h) / 2 / systemZoom + dualScreenTop;
  const newWindow = window.open(
    url,
    title,
    `
    scrollbars=yes,
    width=${w / systemZoom}, 
    height=${h / systemZoom}, 
    top=${top}, 
    left=${left}
    `
  );

  if (window.focus) newWindow.focus();
};

function isEmpty(obj) {
  for (var key in obj) {
    if (obj.hasOwnProperty(key)) return false;
  }
  return true;
}

function convertToTHDateTime(value) {
  if (value === null) {
    return null;
  }

  const dateTime = moment(value, enDateTimeFormat.dateTime);
  const buddhishYear = dateTime.year() + 543;
  dateTime.year(buddhishYear);

  return dateTime.format(thDateTimeFormat.dateTime);
}

function convertToTHDate(value) {
  if (value === null) {
    return null;
  }

  const date = moment(value, enDateTimeFormat.date);
  const buddhishYear = date.year() + 543;
  date.year(buddhishYear);

  return date.format(thDateTimeFormat.date);
}

function dateTimeTHFormatter(value) {
  if (value === null) {
    return null;
  }

  let html = [];

  html.push('<div style="text-align:center;">');
  html.push(convertToTHDateTime(value));
  html.push("</div>");

  return html.join("");
}

function dateTHFormatter(value) {
  if (value === null) {
    return null;
  }

  let html = [];

  html.push('<div style="text-align:center;">');
  html.push(convertToTHDate(value));
  html.push("</div>");

  return html.join("");
}

function currencyFormatter(value) {
  let html = [];

  html.push('<div style="text-align:right;">');
  html.push($.number(value, 2));
  html.push("</div>");

  return html.join("");
}

function userNameFormatter(value, row) {
  if (row.user === null) {
    return;
  }

  return `${row.user.USER_PREFIX + row.user.USER_F_NAME} ${
    row.user.USER_L_NAME
  }`;
}

function sumFooterFormatter(data) {
  let html = [];
  const field = this.field;
  const amount = data
    .map((row) => {
      return +row[field];
    })
    .reduce((sum, i) => {
      return sum + i;
    }, 0);

  html.push('<div style="text-align:right;">');
  html.push($.number(amount, 2));
  html.push("</div>");

  return html.join("");
}
