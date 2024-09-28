import { useState, useEffect } from 'react';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Head } from '@inertiajs/react';
import Searchbar from "@/Components/sub/Searchbar";
import PrimaryButton from "@/Components/PrimaryButton";
import SecondaryButton from "@/Components/SecondaryButton";
import Modal from '@/Components/Modal';
import UsersTable from '../../Components/Table/index';
import { User } from '@/types';
import axios from "axios"; // Import the shared User type

export default function Users() {
    const [users, setUsers] = useState<User[]>([]);
    const [isAddUserModalOpen, setIsAddUserModalOpen] = useState(false);
    const [newUser, setNewUser] = useState<User>({
        id: 0,
        name: '',
        email: '',
        phone_number: '',
        status: '',
        nationality: '',
        date_added: '',
    });

    useEffect(() => {
        fetchUsers();
    }, []);

    // Function to fetch users from the server
    const fetchUsers = async () => {
        try {
            const response = await axios.get('/api/getUsers'); // Assuming the API endpoint is /api/users
            setUsers(response.data);
        } catch (error) {
            console.error('Failed to fetch users:', error);
        }
    };

    // Function to handle adding a new user
    const addUser = async () => {
        try {
            const response = await axios.post('/api/users', newUser);
            setUsers((prevUsers) => [...prevUsers, response.data]);
            setIsAddUserModalOpen(false);
        } catch (error) {
            console.error('Failed to add user:', error);
        }
    };

    // Function to handle updating an existing user
    const updateUser = async (updatedUser: User) => {
        try {
            const response = await axios.put(`/api/users/${updatedUser.id}`, updatedUser);
            setUsers((prevUsers) =>
                prevUsers.map((user) => (user.id === updatedUser.id ? response.data : user))
            );
        } catch (error) {
            console.error('Failed to update user:', error);
        }
    };
    return (
        <AuthenticatedLayout
            header={
                <div className={'space-y-1'}>
                    <h2 className="font-semibold text-xl text-gray-800 leading-tight">User Management</h2>
                    <h4 className=" text-sm text-gray-500 leading-tight">Manage all the users on the platform</h4>
                </div>
            }
        >
            <Head title="Users" />

            <div className="py-4">
                <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div className="bg-white p-4 overflow-hidden flex justify-between items-center gap-3 shadow-sm sm:rounded-lg">
                        <div className="font-semibold">All Users</div>
                        <div className="flex items-center gap-3 px-6">
                            <Searchbar />
                            <SecondaryButton>Filter</SecondaryButton>
                            <PrimaryButton onClick={() => setIsAddUserModalOpen(true)}>Add User</PrimaryButton>
                        </div>
                    </div>
                </div>
            </div>

            {/* Users Table */}
            <div className="max-w-7xl mx-auto sm:px-6 lg:px-8 pb-12">
                <UsersTable users={users} onUpdateUser={updateUser} />
            </div>

            {/* Add User Modal */}
            <Modal show={isAddUserModalOpen} maxWidth="lg" onClose={() => setIsAddUserModalOpen(false)}>
                <div className="p-6">
                    <h2 className="text-lg font-medium text-gray-900">Add New User</h2>
                    <div className="mt-4 space-y-4">
                        {/* Input fields for adding new user */}
                        <input
                            type="text"
                            placeholder="Name"
                            className="w-full px-4 py-2 border rounded"
                            value={newUser.name}
                            onChange={(e) => setNewUser({ ...newUser, name: e.target.value })}
                        />
                        <input
                            type="email"
                            placeholder="Email"
                            className="w-full px-4 py-2 border rounded"
                            value={newUser.email}
                            onChange={(e) => setNewUser({ ...newUser, email: e.target.value })}
                        />
                        <input
                            type="text"
                            placeholder="Phone Number"
                            className="w-full px-4 py-2 border rounded"
                            value={newUser.phone_number}
                            onChange={(e) => setNewUser({ ...newUser, phone_number: e.target.value })}
                        />
                        <input
                            type="text"
                            placeholder="Status"
                            className="w-full px-4 py-2 border rounded"
                            value={newUser.status}
                            onChange={(e) => setNewUser({ ...newUser, status: e.target.value })}
                        />
                        <input
                            type="text"
                            placeholder="Nationality"
                            className="w-full px-4 py-2 border rounded"
                            value={newUser.nationality}
                            onChange={(e) => setNewUser({ ...newUser, nationality: e.target.value })}
                        />

                    </div>
                    <div className="mt-6 flex justify-end">
                        <button
                            onClick={addUser}
                            className="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600"
                        >
                            Add User
                        </button>
                    </div>
                </div>
            </Modal>
        </AuthenticatedLayout>
    );
}
