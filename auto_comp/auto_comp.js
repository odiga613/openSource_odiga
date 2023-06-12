const dataList = [
  "인문대학1호관","인문대학2호관","사회과학대학","경상대학1호관",
  "경상대학2호관","사범대학1호관","사범대학2호관","생명자원과학대학",
  "해양과학대학1호관","해양과학대학3호관","해양과학대학4호관",
  "자연과학대학1호관","자연과학대학2호관","공과대학1호관",
  "공과대학2호관","공과대학3호관","공과대학4호관","의과대학",
  "의학전문대학원1호관","의학전문대학원","수의과대학","간호대학",
  "음악관","미술관","미래융합대학","약학대학","정문","후문",
  "산학협력관","박물관","감귤화훼과학기술센터","농업창업보육센터",
  "원자력과학기술연구소","어린이급식관리지원센터","친환경농업연구소",
  "주변전실","공과대학부설공장","대운동장","제2운동장",
  "제주테크노파크바이오융합센터2호관","제주대학교골프아카데미",
  "수의과대학부설동물병원","중앙디지털도서관","중앙도서관","평생교육원",
  "아라컨벤션홀","교수회관","법학전문대학원","법대","법과정책연구원",
  "아라뮤즈홀","언어교육원","외국어대학","학생회관","체육관","야외음악당",
  "바이오헬스소재개발연구지원센터","테니스장","학생생활관1호관",
  "학생생활관2호관","학생생활관3호관","학생생활관4호관","학생생활관5호관",
  "학생생활광6호관","인재양성관","정보화본부","교양강의동","본관",
  "엑센트","H.R.A.","터울림","총학생회실","안단테","총대의원회실",
  "한라카페테리아","동아리연합회실","지식재산교육센터","NH농협은행",
  "우편취급국","건강증진센터","인권센터","학생상담센터",
  "대학일자리플러스센터","아라홀","예비군연대","제주국제개발협력센터",
  "탐라문화연구원","재일제주인센터","국어문화원","공동실험실습관",
  "WISET제주지역센터","교수학습지원센터","과학영재교육원","교육과학연구소",
  "장애학생지원센터","학생군사교육단"
];

const $search = document.querySelector("#search");
const $autoComplete = document.querySelector(".autocomplete");

let nowIndex = 0;

$search.onkeyup = (event) => {
  // 검색어
  const value = $search.value.trim();

  // 자동완성 필터링
  const matchDataList = value
    ? dataList.filter((label) => label.includes(value))
    : [];

  switch (event.keyCode) {
    // UP KEY
    case 38:
      nowIndex = Math.max(nowIndex - 1, 0);
      break;

    // DOWN KEY  
    case 40:
      nowIndex = Math.min(nowIndex + 1, matchDataList.length - 1);
      break;

    // ENTER KEY  
    case 13:
      document.querySelector("#search").value = matchDataList[nowIndex] || "";

      // 초기화
      nowIndex = 0;
      matchDataList.length = 0;
      break;
      
    // 그외 다시 초기화  
    default:
      nowIndex = 0;
      break;
  }    

  // 리스트 보여주기
  showList(matchDataList, value, nowIndex);
};  

const showList = (data, value, nowIndex) => {
  // 정규식으로 변환
  const regex = new RegExp(`(${value})`, "g");
  
  $autoComplete.innerHTML = data
    .map(
      (label, index) => `
      <div class='${nowIndex === index ? "active" : ""}'>
        ${label.replace(regex, "<mark>$1</mark>")}
      </div>  
    `  
    )
    .join("");
};