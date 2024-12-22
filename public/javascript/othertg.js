function toggleOtherAuthorInput() {
    const selectElement = document.getElementById('MaTacGia');
    const otherAuthorDiv = document.getElementById('otherAuthorDiv');

    // Kiểm tra nếu các phần tử tồn tại
    if (!selectElement || !otherAuthorDiv) return;

    // Kiểm tra xem lựa chọn có phải là "Other" không
    if (selectElement.value === 'other') {
        otherAuthorDiv.style.display = 'block';  // Hiển thị ô nhập tác giả mới
    } else {
        otherAuthorDiv.style.display = 'none';   // Ẩn ô nhập tác giả mới
    }
}
