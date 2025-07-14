<template>
    <div class="p-4">
        <table class="text-left w-full shadow-[5px_5px_13px_var(--color-shadow-dark),-5px_-5px_13px_var(--color-shadow-light)] table-fixed">
            <thead>
                <tr class="text-left border-b-2 border-[var(--color-table-border)]">
                    <th class="text-nowrap overflow-hidden p-4">番号</th>
                    <th class="text-nowrap overflow-hidden p-4">タイトル</th>
                    <th class="text-nowrap overflow-hidden p-4">内容</th>
                    <th class="text-nowrap overflow-hidden p-4">担当者</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="task in tasks" class="hover:bg-[var(--color-sub)] text-left border-b-2 border-[var(--color-table-border)]">
                    <td class="text-nowrap overflow-hidden p-4">{{ task.id }}</td>
                    <td class="text-nowrap overflow-hidden p-4">{{ task.title }}</td>
                    <td class="text-nowrap overflow-hidden p-4">{{ task.content }}</td>
                    <td class="text-nowrap overflow-hidden p-4">{{ task.person_in_charge }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script setup>
    const tasks = [
        {
        id: 1,
        title: "環境構築",
        content: "これから実装するToDoの環境構築を行う。",
        person_in_charge: "田中 一郎"
        },
        {
        id: 2,
        title: "一覧画面",
        content: "一覧画面の見た目（フロントエンド）と、DBからデータを取得する処理（バックエンド）を実装する。フロントではまず仮のデータでテーブル表示を実装し、その後、バックエンドが作成したAPIを呼び出して本物のデータに置き換える。最終的に、tasksテーブルに登録されている情報がブラウザに一覧表示される状態を目指す。",
        person_in_charge: "山田 太郎"
        },
        {
        id: 3,
        title: "登録画面",
        content: "タスクを登録するための画面作成と、DBにデータを保存する登録処理を実装する。",
        person_in_charge: "佐藤 花子"
        },
        {
        id: 4,
        title: "バリデーション",
        content: "タスク登録時、入力されたデータが要件を満たしているかチェックする検証処理（バリデーション）を実装する。",
        person_in_charge: "鈴木 次郎"
        },
    ]
    
    
</script>