import { useState } from 'react';
import Modal from '@/Components/Modal';
import PrimaryButton from "@/Components/PrimaryButton";
import SecondaryButton from "@/Components/SecondaryButton";
import { User } from '@/types';
import Dropdown from "@/Components/Dropdown";
import { format } from 'date-fns';

// Define the user type for type checking (optional if using TypeScript)

interface UsersTableProps {
    users: User[];
    onUpdateUser: (user: User) => void;
}

const UsersTable = ({ users, onUpdateUser }: UsersTableProps) => {
    const [selectedUser, setSelectedUser] = useState<User | null>(null);
    const [isViewModalOpen, setIsViewModalOpen] = useState(false);
    const [isEditModalOpen, setIsEditModalOpen] = useState(false);
    const [isDeleteModalOpen, setIsDeleteModalOpen] = useState(false);

    // Handle View, Edit, and Delete Actions
    const handleViewUser = (user: User) => {
        setSelectedUser(user);
        setIsViewModalOpen(true);
    };

    const handleEditUser = (user: User) => {
        setSelectedUser(user);
        setIsEditModalOpen(true);
    };

    const handleDeleteUser = (user: User) => {
        setSelectedUser(user);
        setIsDeleteModalOpen(true);
    };
    return (
        <div className="overflow-x-auto">
            <table className="min-w-full bg-white border">
                <thead>
                <tr className="bg-gray-200 text-left">
                    <th className="py-2 px-4 border-b">Name</th>
                    <th className="py-2 px-4 border-b">Status</th>
                    <th className="py-2 px-4 border-b">Phone Number</th>
                    <th className="py-2 px-4 border-b">Nationality</th>
                    <th className="py-2 px-4 border-b">Date Added</th>
                    <th className="py-2 px-4 border-b">Actions</th>
                </tr>
                </thead>
                <tbody>
                {users.map((user) => (
                    <tr key={user.id} className={''}>
                            <div className={'flex px-3 border-b p-2 gap-3 pxz items-center'}>
                                <div className={'border-2 rounded-full p-5 w-fit h-fit'} />
                                <div className={'flex flex-col '}>
                                    <td className="font-semibold">{user.name}</td>
                                    <td className="text-sm">{user.email}</td>
                                </div>
                            </div>
                            <td className="py-2 px-4 border-b">{user.status}</td>
                            <td className="py-2 px-4 border-b">{user.phone_number}</td>
                            <td className="py-2 px-4 border-b">{user.nationality}</td>
                            <td className="py-2 px-4 border-b">
                                {user.created_at ? format(new Date(user.created_at), 'dd/MM/yyyy') : 'N/A'}
                            </td>
                            <td className="py-2 px-4 border-b flex gap-2">
                                <Dropdown>
                                    <Dropdown.Trigger>
                                        <span className="inline-flex rounded-md">
                                            <button
                                                type="button"
                                                className="inline-flex items-center px-3 py-2  border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150"
                                            >
                                                <svg
                                                    className="ms-2 -me-0.5 h-4 w-4"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 20 20"
                                                    fill="currentColor"
                                                >
                                                    <path
                                                        fillRule="evenodd"
                                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                        clipRule="evenodd"
                                                    />
                                                </svg>
                                            </button>
                                        </span>
                                    </Dropdown.Trigger>

                                    <Dropdown.Content>
                                        <div className={'flex flex-col gap-1'}>
                                            <SecondaryButton className={''} onClick={() => handleViewUser(user)}>View</SecondaryButton>
                                            <SecondaryButton onClick={() => handleEditUser(user)}>Edit</SecondaryButton>
                                            <SecondaryButton onClick={() => handleDeleteUser(user)}>Delete</SecondaryButton>
                                        </div>
                                    </Dropdown.Content>
                                </Dropdown>
                            </td>
                    </tr>
                    ))}
                </tbody>
            </table>

            {/* View Modal */}
            {selectedUser && (
                <Modal show={isViewModalOpen} onClose={() => setIsViewModalOpen(false)}>
                    <div className="p-6">
                        <h2 className="text-lg font-medium text-gray-900">User Details</h2>
                        <div className="mt-4">
                            <p><strong>Name:</strong> {selectedUser.name}</p>
                            <p><strong>Email:</strong> {selectedUser.email}</p>
                            <p><strong>Phone Number:</strong> {selectedUser.phone_number}</p>
                            <p><strong>Status:</strong> {selectedUser.status}</p>
                            <p><strong>Nationality:</strong> {selectedUser.nationality}</p>
                            <p><strong>Registered Date:</strong> {selectedUser.date_added}</p>
                        </div>
                        <div className="mt-6 flex justify-end">
                            <button onClick={() => setIsViewModalOpen(false)} className="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">
                                Close
                            </button>
                        </div>
                    </div>
                </Modal>
            )}

            {/* Edit Modal */}
            {selectedUser && (
                <Modal show={isEditModalOpen} onClose={() => setIsEditModalOpen(false)}>
                    <div className="p-6">
                        <h2 className="text-lg font-medium text-gray-900">Edit User</h2>
                        <div className="mt-4">
                            {/* Edit form content can go here */}
                            <p>Modify the user details and save changes.</p>
                        </div>
                        <div className="mt-6 flex justify-end">
                            <button onClick={() => setIsEditModalOpen(false)} className="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">
                                Close
                            </button>
                        </div>
                    </div>
                </Modal>
            )}

            {/* Delete Confirmation Modal */}
            {selectedUser && (
                <Modal show={isDeleteModalOpen} onClose={() => setIsDeleteModalOpen(false)}>
                    <div className="p-6">
                        <h2 className="text-lg font-medium text-gray-900">Delete User</h2>
                        <div className="mt-4">
                            <p>Are you sure you want to delete user <strong>{selectedUser.name}</strong>? This action cannot be undone.</p>
                        </div>
                        <div className="mt-6 flex justify-end gap-4">
                            <button onClick={() => setIsDeleteModalOpen(false)} className="px-4 py-2 bg-gray-300 text-gray-700 rounded hover:bg-gray-400">
                                Cancel
                            </button>
                            <button className="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600">
                                Delete
                            </button>
                        </div>
                    </div>
                </Modal>
            )}
        </div>
    );
};

export default UsersTable;
