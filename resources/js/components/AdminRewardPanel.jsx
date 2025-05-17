import React, { useEffect, useState } from "react";
import axios from "axios";

const AdminRewardPanel = () => {
    const [users, setUsers] = useState([]);
    const [loading, setLoading] = useState(true);
    const [error, setError] = useState("");

    // دریافت لیست کاربران
    useEffect(() => {
        axios.get("/api/admin/rewards")
            .then((response) => {
                setUsers(response.data);
                setLoading(false);
            })
            .catch((err) => {
                setError("خطا در دریافت اطلاعات کاربران");
                setLoading(false);
            });
    }, []);

    // به‌روزرسانی امتیاز
    const updatePoints = (userId, newPoints) => {
        axios.post(`/api/admin/rewards/${userId}`, { points: newPoints })
            .then((response) => {
                alert(response.data.message);
                setUsers((prevUsers) =>
                    prevUsers.map((user) =>
                        user.id === userId ? { ...user, reward: { ...user.reward, points: newPoints } } : user
                    )
                );
            })
            .catch(() => alert("خطا در به‌روزرسانی امتیاز"));
    };

    // ریست کردن امتیاز
    const resetPoints = (userId) => {
        axios.delete(`/api/admin/rewards/${userId}`)
            .then((response) => {
                alert(response.data.message);
                setUsers((prevUsers) =>
                    prevUsers.map((user) =>
                        user.id === userId ? { ...user, reward: { ...user.reward, points: 0 } } : user
                    )
                );
            })
            .catch(() => alert("خطا در ریست کردن امتیاز"));
    };

    if (loading) return <p>در حال بارگذاری...</p>;
    if (error) return <p>{error}</p>;

    return (
        <div>
            <h1>پنل مدیریت امتیاز کاربران</h1>
            <table border="1" style={{ width: "100%", textAlign: "center" }}>
                <thead>
                    <tr>
                        <th>شناسه کاربر</th>
                        <th>نام</th>
                        <th>ایمیل</th>
                        <th>امتیاز</th>
                        <th>عملیات</th>
                    </tr>
                </thead>
                <tbody>
                    {users.map((user) => (
                        <tr key={user.id}>
                            <td>{user.id}</td>
                            <td>{user.name}</td>
                            <td>{user.email}</td>
                            <td>{user.reward ? user.reward.points : 0}</td>
                            <td>
                                <button
                                    onClick={() => {
                                        const newPoints = prompt("مقدار جدید امتیاز:", user.reward ? user.reward.points : 0);
                                        if (newPoints !== null) updatePoints(user.id, parseInt(newPoints, 10));
                                    }}
                                >
                                    ویرایش
                                </button>
                                <button onClick={() => resetPoints(user.id)}>ریست</button>
                            </td>
                        </tr>
                    ))}
                </tbody>
            </table>
        </div>
    );
};

export default AdminRewardPanel;
