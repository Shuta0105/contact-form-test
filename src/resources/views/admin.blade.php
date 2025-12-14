<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FashionablyLate</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <style>
        svg.w-5.h-5 {
            /*paginateメソッドの矢印の大きさ調整のために追加*/
            width: 30px;
            height: 30px;
        }
    </style>
</head>

<body>
    <header class="header">
        <div class="header__inner">
            <h1 class="header__logo">FashionablyLate</h1>
            <form action="/logout" class="logout__form" method="post">
                @csrf
                <button class="logout__button">logout</button>
            </form>
        </div>
    </header>

    <main>
        <div class="admin__content">
            <div class="admin__header">
                <h2>Admin</h2>
            </div>
            <div class="admin__search">
                <form action="/search" class="search__form" method="get">
                    <div class="form__input">
                        <input class="form__input--text" type="text" name="name_or_email" placeholder="名前やメールアドレスを入力してください" value="{{ request('name_or_email') }}">
                    </div>
                    <select class="form__select" name="gender">
                        <option value="">性別</option>
                        <option value="1" {{ request('gender') == 1 ? 'selected' : '' }}>男性</option>
                        <option value="2" {{ request('gender') == 2 ? 'selected' : '' }}>女性</option>
                        <option value="3" {{ request('gender') == 3 ? 'selected' : '' }}>その他</option>
                    </select>
                    <select class="form__select" name="category_id">
                        <option value="">お問い合わせの種類</option>
                        @foreach ($categories as $category)
                        <option value="{{ $category['id'] }}" {{ request('category_id') == $category['id'] ? 'selected' : '' }}>{{ $category->content }}</option>
                        @endforeach
                    </select>
                    <div class="form__input">
                        <input class="form__input--date" type="date" name="date" placeholder="年/月/日" value="{{ request('date') }}">
                    </div>
                    <div class="form__button">
                        <button class="form__button--submit" type="submit">検索</button>
                    </div>
                </form>
                <form action="/reset" class="reset__form" method="get">
                    @csrf
                    <div class="form__button">
                        <button class="form__button--reset">リセット</button>
                    </div>
                </form>
            </div>
            <div class="admin__page">
                <form action="/export" class="export__form" method="get">
                    <input type="hidden" name="name_or_email" value="{{ request('name_or_email') }}">
                    <input type="hidden" name="gender" value="{{ request('gender') }}">
                    <input type="hidden" name="category_id" value="{{ request('category_id') }}">
                    <input type="hidden" name="date" value="{{ request('date') }}">
                    <button class="export-button">エクスポート</button>
                </form>
                <div class="pagination">
                    <a href="{{ $contacts->previousPageUrl() }}" class="page">＜</a>
                    @foreach ($contacts->appends(request()->query())->links()->elements[0] as $page => $url)
                    @if ($page == $contacts->currentPage())
                    <span class="page active">{{ $page }}</span>
                    @else
                    <a href="{{ $url }}" class="page">{{ $page }}</a>
                    @endif
                    @endforeach
                    <a href="{{ $contacts->nextPageUrl() }}" class="page">＞</a>
                </div>
            </div>
            <div class="admin-table">
                <table class="admin-table__inner">
                    <tr class="admin-table__row">
                        <th class="admin-table__header">お名前</th>
                        <th class="admin-table__header">性別</th>
                        <th class="admin-table__header">メールアドレス</th>
                        <th class="admin-table__header">お問い合わせの種類</th>
                        <th class="admin-table__header"></th>
                    </tr>
                    @foreach ($contacts as $contact)
                    <tr class="admin-table__row">
                        <td class="admin-table__item">{{ $contact['last_name'] }}　{{ $contact['first_name'] }}</td>
                        <td class="admin-table__item">
                            {{
                                $contact['gender'] == 1 ? '男性' :
                                ($contact['gender'] == 2 ? '女性' : 'その他')
                            }}
                        </td>
                        <td class="admin-table__item">{{ $contact['email'] }}</td>
                        <td class="admin-table__item">{{ $contact['category']['content'] }}</td>
                        <td class="admin-table__item">
                            <button data-contact='@json($contact)' class="open-modal admin-table__button">詳細</button>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>

        <div id="modal" class="modal-overlay">
            <div class="modal__inner">
                <div class="modal-close">
                    <button id="closeModal" class="modal-close__button">x</button>
                </div>
                <div class="modal-table">
                    <table class="modal-table__inner">
                        <tr class="modal-table__row">
                            <th class="modal-table__header">お名前</th>
                            <td class="modal-table__item" id="modalName"></td>
                        </tr>
                        <tr class="modal-table__row">
                            <th class="modal-table__header">性別</th>
                            <td class="modal-table__item" id="modalGender"></td>
                        </tr>
                        <tr class="modal-table__row">
                            <th class="modal-table__header">メールアドレス</th>
                            <td class="modal-table__item" id="modalEmail"></td>
                        </tr>
                        <tr class="modal-table__row">
                            <th class="modal-table__header">電話番号</th>
                            <td class="modal-table__item" id="modalTel"></td>
                        </tr>
                        <tr class="modal-table__row">
                            <th class="modal-table__header">住所</th>
                            <td class="modal-table__item" id="modalAddress"></td>
                        </tr>
                        <tr class="modal-table__row">
                            <th class="modal-table__header">建物名</th>
                            <td class="modal-table__item" id="modalBuilding"></td>
                        </tr>
                        <tr class="modal-table__row">
                            <th class="modal-table__header">お問い合わせの種類</th>
                            <td class="modal-table__item" id="modalCategory"></td>
                        </tr>
                        <tr class="modal-table__row">
                            <th class="modal-table__header">お問い合わせ内容</th>
                            <td class="modal-table__item" id="modalDetail"></td>
                        </tr>
                    </table>
                </div>
                <form action="/delete" class="modal-delete__form" method="post">
                    @method('DELETE')
                    @csrf
                    <div class="modal-delete">
                        <input type="hidden" id="modalId" name="id">
                        <button class="modal-delete__button">削除</button>
                    </div>
                </form>

            </div>
        </div>
    </main>

    <script>
        const modal = document.getElementById('modal');
        const openBtns = document.querySelectorAll('.open-modal');
        const closeBtn = document.getElementById('closeModal');

        const modalName = document.getElementById('modalName');
        const modalGender = document.getElementById('modalGender');
        const modalEmail = document.getElementById('modalEmail');
        const modalTel = document.getElementById('modalTel');
        const modalAddress = document.getElementById('modalAddress');
        const modalBuilding = document.getElementById('modalBuilding');
        const modalCategory = document.getElementById('modalCategory');
        const modalDetail = document.getElementById('modalDetail');
        const modalId = document.getElementById('modalId');

        openBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                const contact = JSON.parse(btn.dataset.contact);

                modalName.textContent = contact.last_name + "  " + contact.first_name;
                modalGender.textContent =
                    contact.gender == 1 ? '男性' :
                    contact.gender == 2 ? '女性' : 'その他';
                modalEmail.textContent = contact.email;
                modalTel.textContent = contact.tel;
                modalAddress.textContent = contact.address;
                modalBuilding.textContent = contact.building;
                modalCategory.textContent = contact.category.content;
                modalDetail.textContent = contact.detail;
                modalId.value = contact.id;

                modal.classList.add('active');
            });
        });

        closeBtn.addEventListener('click', () => {
            modal.classList.remove('active');
        });
    </script>
</body>

</html>