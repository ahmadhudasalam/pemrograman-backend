// CALLBACK
// const showDownload = (result) => {
//   console.log("Download selesai");
//   console.log(`Hasil Download: ${result}`);
// };

// const download = (callShowDownload) => {
//   setTimeout(function () {
//     const result = "windows-10.exe";
//     callShowDownload(result);
//   }, 3000);
// };



// PROMISE
// const showDownload = (result) => {
//   console.log("Download selesai");
//   console.log(`Hasil Download: ${result}`);
// };

// const download = (ShowDownload) => {
//   return new Promise((resolve) => {
//     setTimeout(function () {
//       const result = "windows-10.exe";
//       resolve(showDownload(result));
//     }, 3000);
//   })
// };



// ASYNC AWAIT
const showDownload = async (result) => {
  console.log("Download selesai");
  console.log(`Hasil Download: ${result}`);
};

const download = async (callShowDownload) => {
  setTimeout(async () => {
    const result = "windows-10.exe";
    await callshowDownload(result);
    }, 3000);
};

download(showDownload);