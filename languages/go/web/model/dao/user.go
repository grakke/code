package dao

import "go-web/model/dao/table"

func CreateUser(user *table.User) error {
	return DB().Create(user).Error
}

func GetUserBYId(userId int64) (*table.User, error) {
	user := new(table.User)
	err := DB().Where("id=?", userId).First(user).Error
	return user, err
}

func GetAllUser() ([]*table.User, error) {
	var users []*table.User
	err := DB().Find(&users).Error
	return users, err
}

func UpdateUserNameById(userName string, userId int64) error {
	user := new(table.User)
	err := DB().Where("id=?", userId).First(user).Error
	if err != nil {
		return err
	}
	user.UserName = userName
	return DB().Save(user).Error
}

func DeleteUserById(userId int64) error {
	user := new(table.User)
	err := DB().Where("id=?", userId).First(user).Error
	if err != nil {
		return err
	}
	return DB().Delete(user).Error
}
