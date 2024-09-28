import InputLabel from "@/Components/InputLabel";
import TextInput from "@/Components/TextInput";
import InputError from "@/Components/InputError";

type Props = {};
const Searchbar = (props: Props) => {
    return (
        <div className="hidden sm:block">
            <form action="/" method="POST">
                <div className={'px-4 text-sm w-full'}>

                    <TextInput
                        id="search"
                        type="text"
                        name="search"
                        placeholder={'Search Users'}
                        className="mt-1 block text-sm w-full"
                        autoComplete="Search"
                        isFocused={true}
                    />

                </div>
            </form>
        </div>
    );
};
export default Searchbar;
